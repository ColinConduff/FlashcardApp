@extends('app')

@section('content')

	<div class="container">
		<ul class="nav nav-pills nav-justified">
		  <li role="presentation"><a href="{{ url('/decks') }}">Decks</a></li>
		  <li role="presentation"><a href="{{ url('/reviews') }}">Reviews</a></li>
		  <li role="presentation"><a href="{{ url('/notes') }}">Notes</a></li>
		  <li role="presentation"><a href="{{ url('/posts') }}">Posts</a></li>
		  <li role="presentation"><a href="{{ url('/comments') }}">Comments</a></li>
		</ul>
	</div>

	<div class="container">
		<h1 class="text-center">Posts</h1>

		<div class="row">
		<div class="col-md-9">
		<div style="margin-top: 2em;">
		@if(count($posts))
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Body</th>
					<th>Topic</th>
					<th>Score</th>
					<th>Publish Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($posts as $post)
					<tr>
						<td><a href="{{ url('posts', [$post->id]) }}">{{ $post->title }}</a></td>
						<td>{{ $post->body }}</td>
						<td>{{ $post->topic }}</td>
						<td>{{ $post->score }}</td>
						<td>{{ $post->published_at}}</td>
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('posts', [$post->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
						</td>
						<td>
							{!! Form::open(array('url' => 'posts/' . $post->id, 'class' => 'pull-right')) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
			                {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</table>
		@endif
		</div>
		</div>

		<div class="col-md-3">
		<a href="{{ url('posts/create') }}">
		<button type="button" class="btn btn-primary btn-lg" style="height: 200px;">
			Create a New Post!
		</button>
		</a>
		</div>
		</div>

	</div>

@stop