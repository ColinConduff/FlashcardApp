@extends('app')

@section('content')
	<div class="container">
		
		<h1 class="text-center">Create a New Deck</h1>

		<a href="{{ url('decks') }}">View All Decks</a>
	
		<hr/>

		{{-- This is a form for creating decks. --}}

		@include('errors.list')

		{!! Form::open(['url' => 'decks']) !!}
		
			@include('partials.deckForm', ['submitButtonText' => 'Add Deck'])

		{!! Form::close() !!}
		
	</div>
@stop