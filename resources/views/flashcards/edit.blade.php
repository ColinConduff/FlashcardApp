@extends('app')

@section('content')
	<div class="container">
		<h1>Edit</h1>
		
		<hr/>

		{{-- This is a form for editing flashcards --}}
		
		@include('errors.list')

		{!! Form::model($flashcard, ['method' => 'PATCH', 'action' => ['FlashcardController@update', $flashcard->id]]) !!}
			@include('partials.flashcardForm', ['submitButtonText' => 'Edit Flashcard'])
		{!! Form::close() !!}
	</div>
@stop