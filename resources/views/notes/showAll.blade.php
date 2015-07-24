@extends('app')

@section('content')

	<div class="container">
		<ul class="nav nav-pills nav-justified">
		  <li role="presentation"><a href="{{ url('/decks') }}">Decks</a></li>
		  <li role="presentation"><a href="{{ url('/reviews') }}">Reviews</a></li>
		  <li role="presentation"><a href="{{ url('/notes') }}">Notes</a></li>
		  <li role="presentation"><a href="{{ url('/posts') }}">Posts</a></li>
		  <li role="presentation"><a href="{{ url('/comments') }}">Comments</a></li>
		</ul>
	</div>

	{{-- This shows a user all of their notes --}}
	<div class="container">
		<h1 class="text-center">Notes</h1>

		<div style="margin-top: 2em;">
		@if(count($notes))
			<table class="table">
				<tr>
					<th>Referenced Flashcard</th>
					<th>Note Body</th>
					<th>Published At</th>
					<th>Score</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($notes as $note)
					<tr>
						<td>
							<a href="{{ url('flashcards', [$note->flashcard_id]) }}">
								<span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
							</a>
						</td>
						<td>{{ $note->body }}</td>
						<td>{{ $note->published_at }}</td>
						<td>{{ $note->score }}</td>
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('notes', [$note->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
						</td>
						<td>
							{!! Form::open(array('url' => 'notes/' . $note->id)) !!}
			                    {!! Form::hidden('_method', 'DELETE') !!}
			                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
			                {!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</table>
		@endif
		</div>
	</div>

@stop