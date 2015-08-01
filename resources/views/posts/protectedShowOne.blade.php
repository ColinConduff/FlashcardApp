@extends('app')

@section('content')
	
	{{-- 
		The following code is linked to from the forum.  
		It shows one post and its associated without allowing 
		users to edit and delete other users' posts and comments.
	--}}
	
	<div class="container">

		<a href="{{ url('forumTitleDesc') }}">Back to Forum</a>
		
		<div class="panel panel-default text-center">
			<div class="panel-heading">
				<h1>
					<small>
						<a href="{{ url('upvotePost', [$post->id]) }}">
							<span class="glyphicon glyphicon-triangle-top"></span>
						</a>
					</small>
					{{ $post->title }}
				</h1>

				<div class="row">
					<div class="col-xs-4">
						{{ $post->topic }}
					</div>
					<div class="col-xs-4">
						<small>Score: </small>
						<span class="badge">{{ $post->score }}</span>
					</div>
					<div class="col-xs-4">
						{{ date('n/j/y g:i a', strtotime($post->published_at)) }}
					</div>
				</div>
			</div>

			<div class="panel-body">
				{{ $post->body }}
			</div>

		</div>

		<div class="panel panel-default">
			<div class="panel-heading text-center">
				<h3>Comments</h3>
			</div>

			@if($post->comments->count())
				<table class="table">
					@foreach ($post->comments as $comment)
						<tr>
							<td class="text-center">
								<a href="{{ url('upvoteComment', [$comment->id]) }}">
									<span class="glyphicon glyphicon-triangle-top"></span>
								</a>
								<span class="badge">{{ $comment->score }}</span>
							</td>
							<td>
								{{ $comment->body }}
							</td>
							<td class="text-center">
								{{ date('n/j/y g:i a', strtotime($comment->published_at)) }}
							</td>
						</tr>
					@endforeach
				</table>
			@endif

			<div class="panel-footer">
				<div class="row">
					@include('errors.list')
					
					{!! Form::model($post, ['url' => 'comments']) !!}

						<div class="form-group col-sm-6">
							{!! Form::text('body', '', ['class' => 'form-control']) !!}
						</div>
					
						<div hidden=true class="form-group">
							{!! Form::label('post_id', 'Post_id:') !!}
							{!! Form::text('post_id', $post->id, ['class' => 'form-control']) !!}
						</div>
					
						<div class="form-group col-sm-6">
							{!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
						</div>
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	
	</div>


@stop