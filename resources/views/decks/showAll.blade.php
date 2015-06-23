@extends('app')

@section('content')
	<div class="container">
		<h2>Decks</h2>
		<hr/>
		@if(count($decks))
			<ul>
				@foreach ($decks as $deck)
					<h3>title: {{ $deck->title }}</h3>
					<p>average rating: {{ $deck->average_rating }}</p>
					<p>subject: {{ $deck->subject }}</p>
					<p>private: {{ $deck->private }}</p>
				@endforeach
			</ul>
		@endif
	</div>
@stop