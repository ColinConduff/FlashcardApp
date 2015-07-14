@extends('app')

@section('content')
	<div class="container">
		<h1>Edit</h1>
		
		<hr/>

		@include('errors.list')

		{!! Form::model($comment, ['method' => 'PATCH', 'action' => ['CommentController@update', $comment->id]]) !!}
			@include('partials.commentForm', ['submitButtonText' => 'Edit Comment'])
		{!! Form::close() !!}
	</div>
@stop