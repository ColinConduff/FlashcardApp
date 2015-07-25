@extends('app')

@section('content')
	
	{{-- The following code shows a user one post and the comments associated with it --}}
	<div class="container">
		<h1 class="text-center">Post</h1>
		<a href="{{ url('posts') }}">View All Posts</a>

		<div style="margin-top: 2em;">
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Body</th>
					<th>Topic</th>
					<th>Score</th>
					<th>Publish Date</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
					<tr>
						<td>{{ $post->title }}</td>
						<td>{{ $post->body }}</td>
						<td>{{ $post->topic }}</td>
						<td>{{ $post->score }}</td>
						<td>{{ $post->published_at }}</td>
						<td>
							<a href="{{ url('posts', [$post->id, 'edit']) }}" class="btn btn-info">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</td>
						<td>
							{!! Form::open(array('url' => 'posts/' . $post->id)) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
			                {!! Form::close() !!}
						</td>
					</tr>
			</table>
		</div>

	<h3 class="text-center">Comments</h3>

	<div class="row">
		<div class="col-md-9">
			<div style="margin-top: 2em;">
				@if(count($comments))
					<table class="table">
						<tr>
							<th>Body</th>
							<th>Score</th>
							<th>Published At</th>
						</tr>
						@foreach ($comments as $comment)
							<tr>
								<td><a href="{{ url('comments', [$comment->id]) }}">{{ $comment->body }}</a></td>
								<td>{{ $comment->score }}</td>
								<td>{{ $comment->published_at }}</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>
		</div>

		@if(count($comments))
			<div class="col-md-3 text-center">
				@include('errors.list')
				
				{!! Form::model($post, ['url' => 'comments']) !!}

					<div class="form-group">
						{!! Form::text('body', '', ['class' => 'form-control']) !!}
					</div>
				
					<div hidden=true class="form-group">
						{!! Form::label('post_id', 'Post_id:') !!}
						{!! Form::text('post_id', $post->id, ['class' => 'form-control']) !!}
					</div>
				
					<div class="form-group">
						{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
					</div>
				
				{!! Form::close() !!}
			</div>
		@else
			<div class="col-md-12 text-center">
				@include('errors.list')
				
				{!! Form::model($post, ['url' => 'comments']) !!}

					<div class="form-group">
						{!! Form::text('body', '', ['class' => 'form-control']) !!}
					</div>
				
					<div hidden=true class="form-group">
						{!! Form::label('post_id', 'Post_id:') !!}
						{!! Form::text('post_id', $post->id, ['class' => 'form-control']) !!}
					</div>
				
					<div class="form-group">
						{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
					</div>
				
				{!! Form::close() !!}
			</div>
		@endif
	</div>
	
	</div>


@stop