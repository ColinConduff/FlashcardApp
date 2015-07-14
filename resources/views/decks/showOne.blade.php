@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Deck: {{ $deck->title }}</h1>
		<a href="{{ url('decks') }}">View All Decks</a>

		<div style="margin-top: 2em;">
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Rating</th>
					<th>Subject</th>
					<th>Private</th>
					<th>Edit</th>
					<th>Delete</th>
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
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('decks', [$deck->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
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
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($flashcards as $flashcard)
					<tr>
						<td><a href="{{ url('flashcards', [$flashcard->id]) }}">{{ $flashcard->front }}</a></td>
						<td>{{ $flashcard->back }}</td>
						<td>{{ $flashcard->number_of_attempts }}</td>
						<td>{{ $flashcard->number_correct }}</td>
						<td>{{ $flashcard->ratio_correct }}</td>
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('flashcards', [$flashcard->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
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

		@if(count($reviews))
		<div class="col-md-3 text-center">
		@include('errors.list')
		
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
		@else
		<div class="col-md-12 text-center">
			@include('errors.list')
		
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
		@endif
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
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($reviews as $review)
					<tr>
						<td>{{ $review->title }}</td>
						<td>{{ $review->body }}</td>
						<td>{{ $review->rating }}</td>
						<td>{{ $review->published_at }}</td>
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
				@endforeach
			</table>
		@endif
	</div>
	</div>

	@if(count($reviews))
		<div class="col-md-3 text-center">
			@include('errors.list')
			
			{!! Form::model($deck, ['url' => 'reviews']) !!}

				<div class="form-group">
					{!! Form::label('title', 'Title:' ) !!}
					{!! Form::text('title', '', ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group">
					{!! Form::label('body', 'Body:' ) !!}
					{!! Form::text('body', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('rating', 'Rating:' ) !!}
					{!! Form::text('rating', null, ['class' => 'form-control']) !!}
				</div>
			
				<div hidden=true class="form-group">
					{!! Form::label('deck_id', 'Deck_id:') !!}
					{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group">
					{!! Form::submit('Add Review', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			
			{!! Form::close() !!}
		</div>
	@else
		<div class="col-md-12 text-center">
			@include('errors.list')
			
			{!! Form::model($deck, ['url' => 'reviews']) !!}

			
				<div class="form-group">
					{!! Form::label('title', 'Title:' ) !!}
					{!! Form::text('title', '', ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group">
					{!! Form::label('body', 'Body:' ) !!}
					{!! Form::text('body', null, ['class' => 'form-control']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('rating', 'Rating:' ) !!}
					{!! Form::text('rating', null, ['class' => 'form-control']) !!}
				</div>
			
				<div hidden=true class="form-group">
					{!! Form::label('deck_id', 'Deck_id:') !!}
					{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group">
					{!! Form::submit('Add Review', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			
			{!! Form::close() !!}
		</div>
	@endif
	</div>
	</div>

	</div>
@stop