@extends('app')

@section('content')

	<div class="container">
		<h1 class="text-center">Study</h1>
		<hr/>

		{{-- 
			This is a form that allows users to select 
			several decks to study flashcards from. 
		--}}

		@include('errors.list')

		{!! Form::open(['url' => 'studySelectedDecks']) !!}

		    <div class="form-group">
			    {!! Form::select('id[]', $decks, null, ['class' => 'form-control', 'style' => 'width:100%']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Study', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}

	</div>

@stop