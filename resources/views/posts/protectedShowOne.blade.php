@extends('app')

@section('content')
	
	{{-- 
		The following code is linked to from the forum.  
		It shows one post and its associated without allowing 
		users to edit and delete other users' posts and comments.
	--}}
	
	<div class="container">
		<h1 class="text-center">Post</h1>
		<a href="{{ url('forumTitleDesc') }}">Back to Forum</a>

		<div style="margin-top: 2em;">
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Body</th>
					<th>Topic</th>
					<th>Score</th>
					<th>Publish Date</th>
				</tr>
				<tr>
					<td>
						<a href="{{ url('upvotePost', [$post->id]) }}">
							<span class="glyphicon glyphicon-triangle-top"></span>
						</a>
						{{ $post->title }}
					</td>
					<td>{{ $post->body }}</td>
					<td>{{ $post->topic }}</td>
					<td>{{ $post->score }}</td>
					<td>{{ $post->published_at }}</td>
				</tr>
			</table>
		</div>

		<h3 class="text-center">Comments</h3>

		<div class="row">
			<div class="col-md-9">
				<div style="margin-top: 2em;">
					@if($post->comments->count())
						<table class="table">
							<tr>
								<th>Body</th>
								<th>Score</th>
								<th>Published At</th>
							</tr>
							@foreach ($post->comments as $comment)
								<tr>
									<td>
										<a href="{{ url('upvoteComment', [$comment->id]) }}">
											<span class="glyphicon glyphicon-triangle-top"></span>
										</a>
										{{ $comment->body }}
									</td>
									<td>{{ $comment->score }}</td>
									<td>{{ $comment->published_at }}</td>
								</tr>
							@endforeach
						</table>
					@endif
				</div>
			</div>

			@if($post->comments->count())
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