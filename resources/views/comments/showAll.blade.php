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
		<h1 class="text-center">Comments</h1>

		<div style="margin-top: 2em;">
		@if(count($comments))
			<table class="table">
				<tr>
					<th>Referenced Post</th>
					<th>Note Body</th>
					<th>Published At</th>
					<th>Score</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($comments as $comment)
					<tr>
						<td>
							<a href="{{ url('posts', [$comment->post_id]) }}">
								<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
							</a>
						</td>
						<td>{{ $comment->body }}</td>
						<td>{{ $comment->published_at }}</td>
						<td>{{ $comment->score }}</td>
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('comments', [$comment->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
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
		<h3 class="text-center">Nothing to see here...</h3>
		@endif
		</div>
	</div>

@stop