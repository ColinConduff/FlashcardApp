@extends('app')

@section('content')
	<div class="container">
		<h1>Edit</h1>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($flashcard, ['method' => 'PATCH', 'action' => ['FlashcardController@update', $flashcard->id]]) !!}
			@include('partials.flashcardForm', ['submitButtonText' => 'Edit Flashcard'])
		{!! Form::close() !!}
	</div>
@stop