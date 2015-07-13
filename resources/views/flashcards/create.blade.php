<!-- 
/////////////////Don't use this//////////////////////

@extends('app')

@section('content')
	<div class="container">
		
		<h1>Create a New Flashcard</h1>
	
		<hr/>

		@include('errors.list')
		
		{!! Form::open(['url' => 'flashcards']) !!}
		
			@include('partials.flashcardForm', ['submitButtonText' => 'Add Flashcard'])

		{!! Form::close() !!}
		
	</div>
@stop -->