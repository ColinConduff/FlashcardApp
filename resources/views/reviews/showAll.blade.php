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

	{{-- This shows the user all of their reviews --}}
	
	<div class="container">
		<h1 class="text-center">Reviews</h1>

		<div style="margin-top: 2em;">
		@if(count($reviews))
			<table class="table">
				<tr>
					<th>Referenced Deck</th>
					<th>Title</th>
					<th>Body</th>
					<th>Rating</th>
					<th>Publish Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($reviews as $review)
					<tr>
						<td>
							<a href="{{ url('decks', [$review->deck_id]) }}">
								<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
							</a>
						</td>
						<td><a href="{{ url('reviews', [$review->id]) }}">{{ $review->title }}</a></td>
						<td>{{ $review->body }}</td>
						<td>{{ $review->rating }}</td>
						<td>{{ $review->published_at}}</td>
						<td>
							<a href="{{ url('reviews', [$review->id, 'edit']) }}" class="btn btn-info">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</td>
						<td>
							{!! Form::open(array('url' => 'reviews/' . $review->id)) !!}
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

@stop