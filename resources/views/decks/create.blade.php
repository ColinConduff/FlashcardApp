@extends('app')

@section('content')
	<div class="container">
		
		<h1>Create a New Deck</h1>
	
		<hr/>

		@include('errors.list')

		{!! Form::open(['url' => 'decks']) !!}
		
			@include('partials.deckForm', ['submitButtonText' => 'Add Deck'])

		{!! Form::close() !!}
		
	</div>
@stop