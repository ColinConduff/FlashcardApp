@extends('app')

@section('content')
	<div class="container">
		
		<h1>Create a New Post</h1>
	
		<hr/>

		@include('errors.list')

		{!! Form::open(['url' => 'posts']) !!}
		
			@include('partials.postForm', ['submitButtonText' => 'Add Post'])

		{!! Form::close() !!}
		
	</div>
@stop

