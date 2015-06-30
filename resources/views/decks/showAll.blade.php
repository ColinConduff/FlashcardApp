@extends('app')

@section('content')

	<div class="container">
		<h1 class="text-center">Decks</h1>
		<hr/>
		

		<button type="button" class="btn btn-primary btn-lg btn-block">
			Create a New Deck!
		</button>

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
								True
							@else
								False
							@endif
						</td>
						<td>
							<button type="button" class="btn btn-info">
								<a href="{{ url('decks', [$deck->id, 'edit']) }}">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</button>
						</td>
						<td>
		    				<button type="button" class="btn btn-danger">
		    					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		    				</button>
						</td>
					</tr>
				@endforeach
			</table>
		@endif
		</div>

	</div>

@stop