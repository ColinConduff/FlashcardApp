@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Deck: {{ $deck->title }}</h1>
		<hr/>

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
								True
							@else
								False
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

		@include('errors.list')
		
		{!! Form::model($deck, ['url' => 'flashcards']) !!}

		<table class="table text-center">
		<tr>
		<td>
			<div class="form-group">
				{!! Form::label('front', 'Front:' ) !!}
				{!! Form::text('front', null, ['class' => 'form-control']) !!}
			</div>
		</td>
		<td>

			<div class="form-group">
				{!! Form::label('back', 'Back:') !!}
				{!! Form::text('back', null, ['class' => 'form-control']) !!}
			</div>
		</td>
		<td>
			<div hidden=true class="form-group">
				{!! Form::label('deck_id', 'Deck_id:') !!}
				{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
			</div>
		</td>
		<td>
			<div class="form-group">
				{!! Form::submit('Add Flashcard', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		</td>
		</tr>
		</table>
		{!! Form::close() !!}

		<a href="{{ url('decks') }}">View All Decks</a>
	</div>
@stop