@extends('app')

@section('content')
	<div class="container">
		<h1 class="text-center">Edit: {!! $post->title !!}</h1>
		<a href="{{ url('posts') }}">View All Decks</a>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update', $post->id]]) !!}
			@include('partials.postForm', ['submitButtonText' => 'Edit Post'])
		{!! Form::close() !!}
	</div>
@stop