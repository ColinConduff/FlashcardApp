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

	{{-- The following code shows the user all of their decks.  --}}

	<div class="container">
		<h1 class="text-center">Decks</h1>

		<a href="{{ url('decks/create') }}" class="btn btn-primary btn-block">
			Create a New Deck!
		</a>

		<div style="margin-top: 2em;">
		@if(count($decks))
			<table class="table">
				<tr>
					<th>Title</th>
					<th>Rating</th>
					<th>Subject</th>
					<th>Private</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				@foreach ($decks as $deck)
					<tr>
						<td><a href="{{ url('decks', [$deck->id]) }}">{{ $deck->title }}</a></td>
						<td>{{ $deck->average_rating }}</td>
						<td>{{ $deck->subject }}</td>
						<td>
							@if ( $deck->private )
								Private
							@else
								Public
							@endif
						</td>
						<td>
							<a href="{{ url('decks', [$deck->id, 'edit']) }}" class="btn btn-info">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</a>
						</td>
						<td>
							{!! Form::open(array('url' => 'decks/' . $deck->id)) !!}
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