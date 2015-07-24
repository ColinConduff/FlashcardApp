@extends('app')

@section('content')
	<div class="container">
		
		<h1 class="text-center">Create a New Review</h1>

		<a href="{{ url('reviews') }}">View All Reviews</a>
	
		<hr/>

		{{-- This is a form for creating a review. --}}

		@include('errors.list')

		{!! Form::open(['url' => 'reviews']) !!}
		
			@include('partials.reviewForm', ['submitButtonText' => 'Add Review'])

		{!! Form::close() !!}
		
	</div>
@stop