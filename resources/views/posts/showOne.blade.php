@extends('app')

@section('content')
	
	{{-- The following code shows a user one post and the comments associated with it --}}
	<div class="container">

		<a href="{{ url('posts') }}">View All Posts</a>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">{{ $post->title }}</h1>
				<div class="row text-center">
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
				<td>{{ $post->body }}</td>
			</div>

			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-6">
						<a href="{{ url('posts', [$post->id, 'edit']) }}" class="btn btn-info btn-block">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</div>
					<div class="col-xs-6">
						{!! Form::open(array('url' => 'posts/' . $post->id)) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}
		                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger btn-block')) !!}
		                {!! Form::close() !!}
		            </div>
		        </div>
            </div>

		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="text-center">Comments</h3>
			</div>

			@if(count($comments))
				<table class="table text-center">
					@foreach ($comments as $comment)
						<tr>
							<td><div class="badge">{{ $comment->score }}</div></td>
							<td><a href="{{ url('comments', [$comment->id]) }}">{{ $comment->body }}</a></td>
							<td>{{ date('n/j/y g:i a', strtotime($comment->published_at)) }}</td>
						</tr>
					@endforeach
				</table>
			@endif

			<div class="panel-body">
				@include('errors.list')
				
				{!! Form::model($post, ['url' => 'comments']) !!}
					<div class="row">
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
					</div>
				
				{!! Form::close() !!}
			</div>
		</div>
	
	</div>


@stop