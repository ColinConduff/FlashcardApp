@extends('app')

@section('content')
	<div class="container">
		<h1>Edit: {!! $post->title !!}</h1>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostController@update', $post->id]]) !!}
			@include('partials.postForm', ['submitButtonText' => 'Edit Post'])
		{!! Form::close() !!}
	</div>
@stop