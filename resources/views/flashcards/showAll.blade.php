<!-- @extends('app')

@section('content')

	<div class="container">
		<h1 class="text-center">Flashcards</h1>
		<hr/>
		
		<a href="{{ url('flashcards/create') }}">
		<button type="button" class="btn btn-primary btn-lg btn-block">
			Create a New flashcard!
		</button>
		</a>

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

@stop -->