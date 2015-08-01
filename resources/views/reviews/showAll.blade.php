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

	{{-- This shows the user all of their reviews --}}
	
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="text-center">Reviews</h1>
			</div>

			@if(count($reviews))
				<table class="table">
					@foreach ($reviews as $review)
						<tr>
							<td>
								<a href="{{ url('showProtectedDeck', [$review->deck_id]) }}">
									{{ $review->deck->title }}
								</a>
							</td>
							<td><a href="{{ url('reviews', [$review->id]) }}">{{ $review->title }}</a></td>
							<td>
								@for($i = 1; $i <= $review->rating; $i++)
									<span class="glyphicon glyphicon-star"></span>
								@endfor

								@for($i = $review->rating + 1; $i <= 5 ; $i++)
									<span class="glyphicon glyphicon-star-empty"></span>
								@endfor
							</td>
							<td>{{ date('n/j/y g:i a', strtotime($review->published_at)) }}</td>
							<td>
								<a href="{{ url('reviews', [$review->id, 'edit']) }}" class="btn btn-info">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
								</a>
							</td>
							<td>
								{!! Form::open(array('url' => 'reviews/' . $review->id)) !!}
				                    {!! Form::hidden('_method', 'DELETE') !!}
				                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger')) !!}
				                {!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</table>
			@endif
		</div>

		<div class="text-center">{!! $reviews->render() !!}</div>

	</div>

@stop