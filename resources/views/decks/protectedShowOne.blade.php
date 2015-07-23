@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Deck: <small>{{ $deck->title }}</small></h1>
		<a href="{{ url('browseTitleDesc') }}">Back to Browse</a>

		<div style="margin-top: 2em;">
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Rating</th>
					<th>Subject</th>
					<th>Private</th>
				</tr>
				<tr>
					<td>{{ $deck->title }}</td>
					<td>{{ $deck->average_rating }}</td>
					<td>{{ $deck->subject }}</td>
					<td>
						@if ( $deck->private )
							Private
						@else
							Public
						@endif
					</td>
				</tr>
			</table>
		</div>

		<h3 class="text-center">Flashcards</h3>

		<div class="row">
			<div class="col-md-9">
				<div style="margin-top: 2em;">
					@if(count($flashcards))
						<table class="table">
							<tr>
								<th>Front</th>
								<th>Back</th>
								<th>Number of Attempts</th>
								<th>Number Correct</th>
								<th>Ratio Correct</th>
							</tr>
							@foreach ($flashcards as $flashcard)
								<tr>
									<td><a href="{{ url('flashcards', [$flashcard->id]) }}">{{ $flashcard->front }}</a></td>
									<td>{{ $flashcard->back }}</td>
									<td>{{ $flashcard->number_of_attempts }}</td>
									<td>{{ $flashcard->number_correct }}</td>
									<td>{{ $flashcard->ratio_correct }}</td>
								</tr>
							@endforeach
						</table>
					@endif
				</div>
			</div>
		</div>

		<div class="row">
			<h3 class="text-center">Reviews</h3>
			<div class="col-md-9">
				<div style="margin-top: 2em;">
					@if(count($reviews))
						<table class="table">
							<tr>
								<th>Title</th>
								<th>Body</th>
								<th>Rating</th>
								<th>Published At</th>
							</tr>
							@foreach ($reviews as $review)
								<tr>
									<td>{{ $review->title }}</td>
									<td>{{ $review->body }}</td>
									<td>{{ $review->rating }}</td>
									<td>{{ $review->published_at }}</td>
								</tr>
							@endforeach
						</table>
					@endif
				</div>
			</div>
		</div>

	</div>
@stop