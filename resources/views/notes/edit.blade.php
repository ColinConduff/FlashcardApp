@extends('app')

@section('content')
	<div class="container">
		<h1>Edit</h1>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($note, ['method' => 'PATCH', 'action' => ['NoteController@update', $note->id]]) !!}
			@include('partials.noteForm', ['submitButtonText' => 'Edit Note'])
		{!! Form::close() !!}
	</div>
@stop