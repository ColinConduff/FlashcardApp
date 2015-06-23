@extends('app')

@section('content')
	<div class="container">
		<h2>Deck</h2>
		<hr/>
		
		<h3>title: {{ $deck->title }}</h3>
		<p>subject: {{ $deck->subject }}</p>
		<p>avg. rating: {{ $deck->average_rating }}</p>
		<p>private: {{ $deck->private }}</p>
	</div>
@stop