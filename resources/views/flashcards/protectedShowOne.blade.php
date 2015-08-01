@extends('app')

@section('content')
	
	{{-- 
		The following code shows users their 
		flashcards and the notes associated with them. 
	--}}
	
	<div class="container">
		<a href="{{ url('showProtectedDeck', [$flashcard->deck_id]) }}">Back</a>

		@include('errors.list')

		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Flashcard</h1>
			</div>

			<table class="table text-center">
				<tr>
					<td>{{ $flashcard->front }}</td>
					<td>{{ $flashcard->back }}</td>
				</tr>
			</table>
		</div>

	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="text-center">Notes</h3>
		</div>
		<div class="row" style="padding:1em">
			<div class="col-xs-8">
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
			</div>

			@if($flashcard->notes->count())
				<div class="col-xs-4 text-center">
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
				<div class="col-xs-offset-1 col-xs-10 text-center" style="padding-top:1em">
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