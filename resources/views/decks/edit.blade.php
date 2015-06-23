@extends('app')

@section('content')
	<div class="container">
		<h1>Edit: {!! $deck->title !!}</h1>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($deck, ['method' => 'PATCH', 'action' => ['DeckController@update', $deck->id]]) !!}
			@include('partials.deckForm', ['submitButtonText' => 'Edit Deck'])
		{!! Form::close() !!}
	</div>
@stop