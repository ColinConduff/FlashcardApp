@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Flashcard</h1>
		<a href="{{ url('decks', [$flashcard->deck_id]) }}">View All Decks</a>

		<div style="margin-top: 2em;">
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
					<tr>
						<td>{{ $flashcard->front }}</td>
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
			</table>
		</div>

	<h3 class="text-center">Notes</h3>

	<div class="row">
	<div class="col-md-9">
	<div style="margin-top: 2em;">
		@if(count($notes))
			<table class="table">
				<tr>
					<th>Body</th>
					<th>Score</th>
					<th>Published At</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($notes as $note)
					<tr>
						<td>{{ $note->body }}</td>
						<td>{{ $note->score }}</td>
						<td>{{ $note->published_at }}</td>
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('notes', [$note->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
						</td>
						<td>
							{!! Form::open(array('url' => 'notes/' . $note->id)) !!}
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

	@if(count($notes))
		<div class="col-md-3 text-center">
			@include('errors.list')
			
			{!! Form::model($flashcard, ['url' => 'notes']) !!}

			
				<div class="form-group">
					{!! Form::text('body', null, ['class' => 'form-control']) !!}
				</div>
			
				<div hidden=true class="form-group">
					{!! Form::label('flashcard_id', 'Flashcard_id:') !!}
					{!! Form::text('flashcard_id', $flashcard->id, ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group">
					{!! Form::submit('Add Note', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			
			{!! Form::close() !!}
		</div>
	@else
		<div class="col-md-12 text-center">
			@include('errors.list')
			
			{!! Form::model($flashcard, ['url' => 'notes']) !!}

			
				<div class="form-group">
					{!! Form::text('body', null, ['class' => 'form-control']) !!}
				</div>
			
				<div hidden=true class="form-group">
					{!! Form::label('flashcard_id', 'Flashcard_id:') !!}
					{!! Form::text('flashcard_id', $flashcard->id, ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group">
					{!! Form::submit('Add Note', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			
			{!! Form::close() !!}
		</div>
	@endif
	</div>
	</div>

	</div>
@stop