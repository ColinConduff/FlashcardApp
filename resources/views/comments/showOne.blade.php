@extends('app')

@section('content')	
	<div class="container">
		<h1 class="text-center">Comment</h1>

		<div style="margin-top: 2em;">
			<table class="table">
				<tr>
					<th>Referenced Post</th>
					<th>Note Body</th>
					<th>Published At</th>
					<th>Score</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<tr>
					<td>
						<a href="{{ url('posts', [$comment->post_id]) }}">
							<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
						</a>
					</td>
					<td>{{ $comment->body }}</td>
					<td>{{ $comment->published_at }}</td>
					<td>{{ $comment->score }}</td>
					<td>
						<button type="button" class="btn btn-info">
							<a href="{{ url('comments', [$comment->id, 'edit']) }}">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</button>
					</td>
					<td>
						{!! Form::open(array('url' => 'comments/' . $comment->id)) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}
		                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
		                {!! Form::close() !!}
					</td>
				</tr>
			</table>
		</div>
	</div>
@stop