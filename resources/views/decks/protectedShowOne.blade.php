@extends('app')

@section('content')
	
	{{-- 
		This code is used to browse other user's decks and the 
		flashcards and reviews associated with those decks.
	--}}

	<div class="container">
		
		<a href="{{ url('browseTitleDesc') }}">Back to Browse</a>
		
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h1 class="text-center">{{ $deck->title }}</h1>
			</div>

			<div class="panel-body">
				<a href="{{ url('cloneDeck', [$deck->id]) }}" class="btn btn-primary btn-block">Clone Deck</a>
			</div>
			
			<table class="table text-center">
				<tr>
					<td>
						Rating: 
						<span class="badge">
							{{ $deck->average_rating }}
						</span>
					</td>
					<td>
						Subject:
						{{ $deck->subject }}
					</td>
					<td>
						Status:
						@if ( $deck->private )
							Private
						@else
							Public
						@endif
					</td>
				</tr>
			</table>
		</div>

		@if(count($flashcards))
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Flashcards</h3>
				</div>
				@if(count($flashcards))
					<table class="table text-center">
						@foreach ($flashcards as $flashcard)
							<tr>
								<td><a href="{{ url('showProtectedFlashcard', [$flashcard->id]) }}">{{ $flashcard->front }}</a></td>
								<td>{{ $flashcard->back }}</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>
			<div class="text-center">{!! $flashcards->render() !!}</div>
		@endif

		@if(count($reviews))
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="text-center">Reviews</h3>
				</div>
				<table class="table text-center">
					@foreach ($reviews as $review)
						<tr>
							<td><span class="badge">{{ $review->rating }}</span></td>
							<td><a href="{{ url('showProtectedReview', [$review->id]) }}">{{ $review->title }}</a></td>
							<td>{{ date('n/j/y g:i a', strtotime($review->published_at)) }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="text-center">{!! $reviews->render() !!}</div>
		@endif

		<div class="well">
			@include('errors.list')

			{!! Form::open(['url' => 'reviews']) !!}
			
				<div class="form-group">
					{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
				</div>

				<div class="form-group">
					{!! Form::text('body', null, ['class' => 'form-control', 'placeholder' => 'Body']) !!}
				</div>

				<div class="form-group">
					{!! Form::text('rating', null, ['class' => 'form-control', 'placeholder' => 'Rating (1-5)']) !!}
				</div>

				<div hidden=true class="form-group">
					{!! Form::label('deck_id', 'Deck id:') !!}
					{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::submit('Write a Review', ['class' => 'btn btn-primary form-control']) !!}
				</div>

			{!! Form::close() !!}
		</div>

	</div>
@stop