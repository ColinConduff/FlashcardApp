@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Edit</h1>

		<a href="{{ url('reviews') }}">View All Reviews</a>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($review, ['method' => 'PATCH', 'action' => ['ReviewController@update', $review->id]]) !!}
			@include('partials.reviewForm', ['submitButtonText' => 'Edit Review'])
		{!! Form::close() !!}
	</div>
@stop