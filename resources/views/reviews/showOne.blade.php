@extends('app')

@section('content')

	<div class="container">
		<h1 class="text-center">Review:  {{ $review->title }}</h1>
		<a href="{{ url('reviews') }}">View All Reviews</a>

		{{-- This shows a user one of their reviews --}}
		<div style="margin-top: 2em;">
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
				<tr>
					<td>
						<a href="{{ url('decks', [$review->deck_id]) }}">
							<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
						</a>
					</td>
					<td>{{ $review->title }}</td>
					<td>{{ $review->body }}</td>
					<td>{{ $review->rating }}</td>
					<td>{{ $review->published_at}}</td>
					<td>
						<button type="button" class="btn btn-info">
							<a href="{{ url('reviews', [$review->id, 'edit']) }}">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</button>
					</td>
					<td>
						{!! Form::open(array('url' => 'reviews/' . $review->id)) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}
		                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
		                {!! Form::close() !!}
					</td>
				</tr>
			</table>
		</div>

	</div>

@stop