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
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Notes</h1>
			</div>

			@if(count($notes))
				<table class="table">
					@foreach ($notes as $note)
						<tr>
							<td>
								<a href="{{ url('showProtectedFlashcard', [$note->flashcard_id]) }}">
									{{ $note->flashcard->front }}
								</a>
							</td>
							<td><span class="badge">{{ $note->score }}</span></td>
							<td>{{ $note->body }}</td>
							<td>{{ date('n/j/y g:i a', strtotime($note->published_at)) }}</td>
							<td>
								<a href="{{ url('notes', [$note->id, 'edit']) }}" class="btn btn-info">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
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

		<div class="text-center">{!! $notes->render() !!}</div>

	</div>

@stop