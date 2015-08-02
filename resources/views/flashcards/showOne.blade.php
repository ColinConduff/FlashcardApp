@extends('app')

@section('content')
	
	{{-- 
		The following code shows users their 
		flashcards and the notes associated with them. 
	--}}
	
	<div class="container">
		<a href="{{ url('decks', [$flashcard->deck_id]) }}">Back</a>

		@include('errors.list')

		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Flashcard</h1>
			</div>

			<div class="panel-body text-center">
				<div class="row">
					<div class="col-sm-6">
						{{ $flashcard->front }}
					</div>
					<div class="col-sm-6">
						{{ $flashcard->back }}
					</div>
				</div>

				<hr>
			
				<div class="row">
					<div class="col-sm-4">
						<small>Attempts: </small>{{ $flashcard->number_of_attempts }}
					</div>
					<div class="col-sm-4">
						<small>Correct: </small>{{ $flashcard->number_correct }}
					</div>
					<div class="col-sm-4">
						{{ $flashcard->ratio_correct * 100 }} %
					</div>
				</div>

				<hr>
				
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ url('flashcards', [$flashcard->id, 'edit']) }}" class="btn btn-info btn-block">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</div>

					<div class="col-sm-6">
						{!! Form::open(array('url' => 'flashcards/' . $flashcard->id)) !!}
			                {!! Form::hidden('_method', 'DELETE') !!}
			                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger btn-block')) !!}
			            {!! Form::close() !!}
		            </div>
		        </div>
	        </div>
		</div>

	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="text-center">Notes</h3>
		</div>

		@if($flashcard->notes->count())
			<table class="table text-center">
				@foreach ($flashcard->notes as $note)
					<tr>
						<td>	
							<a href="{{ url('upvoteNote', [$note->id]) }}">
								<span class="glyphicon glyphicon-triangle-top"></span>
							</a>
							{{ $note->body }}
						</td>
						<td>{{ $note->score }}</td>
						<td>{{ date('n/j/y g:i a', strtotime($note->published_at)) }}</td>
					</tr>
				@endforeach
			</table>
		@endif

			
		<div class="panel-footer text-center">
			<div class="row">
			{!! Form::model($flashcard, ['url' => 'notes']) !!}

				<div class="form-group col-sm-6">
					{!! Form::text('body', null, ['class' => 'form-control']) !!}
				</div>
			
				<div hidden=true class="form-group">
					{!! Form::label('flashcard_id', 'Flashcard_id:') !!}
					{!! Form::text('flashcard_id', $flashcard->id, ['class' => 'form-control']) !!}
				</div>
			
				<div class="form-group col-sm-6">
					{!! Form::submit('Add Note', ['class' => 'btn btn-primary form-control']) !!}
				</div>
			
			{!! Form::close() !!}
			</div>
		</div>

	</div>

	</div>
@stop