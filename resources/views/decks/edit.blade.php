@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Edit: {!! $deck->title !!}</h1>

		<a href="{{ url('decks') }}">View All Decks</a>
		
		<hr/>

		{{-- This form allows users to edit a deck --}}

		@include('errors.list')

		{!! Form::model($deck, ['method' => 'PATCH', 'action' => ['DeckController@update', $deck->id]]) !!}
			@include('partials.deckForm', ['submitButtonText' => 'Edit Deck'])
		{!! Form::close() !!}
	</div>
@stop