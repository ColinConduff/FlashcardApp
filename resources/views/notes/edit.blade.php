@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Edit</h1>
		
		<a href="{{ url('notes') }}">View All Notes</a>

		<hr/>

		{{-- This is a form for editing notes --}}
		
		@include('errors.list')

		{!! Form::model($note, ['method' => 'PATCH', 'action' => ['NoteController@update', $note->id]]) !!}
			@include('partials.noteForm', ['submitButtonText' => 'Edit Note'])
		{!! Form::close() !!}
	</div>
@stop