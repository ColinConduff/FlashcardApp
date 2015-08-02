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

	{{-- This shows a user all of their comments --}}

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Comments</h1>
			</div>

		@if(count($comments))
			<table class="table">
				<tr>
					<th>Referenced Post</th>
					<th>Comment Body</th>
					<th>Published At</th>
					<th>Score</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($comments as $comment)
					<tr>
						<td>
							<a href="{{ url('showProtectedPost', [$comment->post_id]) }}">
								{{ $comment->post->title }}
							</a>
						</td>
						<td>{{ $comment->body }}</td>
						<td>{{ date('n/j/y g:i a', strtotime($comment->published_at)) }}</td>
						<td>{{ $comment->score }}</td>
						<td>
							<a href="{{ url('comments', [$comment->id, 'edit']) }}" class="btn btn-info">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</td>
						<td>
							{!! Form::open(array('url' => 'comments/' . $comment->id)) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
			                {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</table>
		@else
			<div class="panel-body">
				<h3 class="text-center">Nothing to see here...</h3>
			</div>
		@endif
		</div>

		<div class="text-center">{!! $comments->render() !!}</div>
	</div>

@stop