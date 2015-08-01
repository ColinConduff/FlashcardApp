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

	{{-- This section shows a user all of their posts. --}}
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Posts</h1>
			</div>

			<div class="panel-body">
				<a href="{{ url('posts/create') }}" class="btn btn-primary btn-block">
					Create a New Post!
				</a>
			</div>

			@if(count($posts))
				<table class="table">
					@foreach ($posts as $post)
						<tr>
							<td class="text-center"><span class="badge">{{ $post->score }}</span></td>
							<td><a href="{{ url('posts', [$post->id]) }}">{{ $post->title }}</a></td>
							<td>{{ $post->topic }}</td>
							<td>{{ date('n/j/y g:i a', strtotime($post->published_at)) }}</td>
							<td>
								<a href="{{ url('posts', [$post->id, 'edit']) }}" class="btn btn-info">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
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

		<div class="text-center">{!! $posts->render() !!}</div>

	</div>

@stop