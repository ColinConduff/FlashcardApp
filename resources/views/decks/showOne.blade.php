@extends('app')

@section('content')
	
	{{-- 
		The following code shows users their decks and the 
		flashcards and reviews associated with those decks. 
	--}}

	<div class="container">
		<a href="{{ url('decks') }}">View All Decks</a>
		@include('errors.list')
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">{{ $deck->title }}</h1>
			</div>

			<table class="table">
				<tr>
					<td>
						Rating: 
						<span class="badge">{{ $deck->average_rating }}</span>
					</td>
					<td>Topic: {{ $deck->subject }}</td>
					<td>
						Status:
						@if ( $deck->private )
							Private
						@else
							Public
						@endif
					</td>
					<td>
						<a href="{{ url('decks', [$deck->id, 'edit']) }}" class="btn btn-info">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</td>
					<td>
						{!! Form::open(array('url' => 'decks/' . $deck->id)) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}
		                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
		                {!! Form::close() !!}
					</td>
				</tr>
			</table>
		</div>

		<div class="row">
		<div class="col-md-9">
			<div class="panel panel-default">
				
				<div class="panel-heading">
					<h3 class="text-center">Flashcards</h3>
				</div>
				
				@if(count($flashcards))
					<table class="table">
						@foreach ($flashcards as $flashcard)
							<tr>
								<td><a href="{{ url('flashcards', [$flashcard->id]) }}">{{ $flashcard->front }}</a></td>
								<td>
									{{ $flashcard->number_of_attempts }} 
									@if($flashcard->number_of_attempts > 1)
										attempts
									@else
										attempt
									@endif
								</td>
								<td>{{ $flashcard->number_correct }} correct</td>
								<td>{{ $flashcard->ratio_correct * 100 }} %</td>
								<td>
									<a href="{{ url('flashcards', [$flashcard->id, 'edit']) }}" class="btn btn-info">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
								</td>
								<td>
									{!! Form::open(array('url' => 'flashcards/' . $flashcard->id)) !!}
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

		@if(count($flashcards))
			<div class="col-md-3 text-center">
				<div class="well">
					{!! Form::model($deck, ['url' => 'flashcards']) !!}

						<div class="form-group">
							{!! Form::label('front', 'Front:' ) !!}
							{!! Form::text('front', null, ['class' => 'form-control']) !!}
						</div>
					
						<div class="form-group">
							{!! Form::label('back', 'Back:') !!}
							{!! Form::text('back', null, ['class' => 'form-control']) !!}
						</div>
					
						<div hidden=true class="form-group">
							{!! Form::label('deck_id', 'Deck_id:') !!}
							{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
						</div>
					
						<div class="form-group">
							{!! Form::submit('Add Flashcard', ['class' => 'btn btn-primary form-control']) !!}
						</div>
					
					{!! Form::close() !!}
				</div>
			</div>
		@else
			<div class="col-md-12 well text-center">
				<div class="well">
					{!! Form::model($deck, ['url' => 'flashcards']) !!}

						<div class="form-group">
							{!! Form::label('front', 'Front:' ) !!}
							{!! Form::text('front', null, ['class' => 'form-control']) !!}
						</div>
					
						<div class="form-group">
							{!! Form::label('back', 'Back:') !!}
							{!! Form::text('back', null, ['class' => 'form-control']) !!}
						</div>
					
						<div hidden=true class="form-group">
							{!! Form::label('deck_id', 'Deck_id:') !!}
							{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
						</div>
					
						<div class="form-group">
							{!! Form::submit('Add Flashcard', ['class' => 'btn btn-primary form-control']) !!}
						</div>
					
					{!! Form::close() !!}
				</div>
			</div>
		@endif
		</div>

	@if(count($reviews))
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="text-center">Reviews</h3>
		</div>
		<table class="table text-center">
			@foreach ($reviews as $review)
				<tr>
					<td><span class="badge">{{ $review->rating }}</span></td>
					<td><a href="{{ url('reviews', [$review->id]) }}">{{ $review->title }}</a></td>
					<td>{{ date('n/j/y g:i a', strtotime($review->published_at)) }}</td>
				</tr>
			@endforeach
		</table>
	</div>
	@endif

	</div>
@stop