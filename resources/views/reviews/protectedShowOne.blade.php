@extends('app')

@section('content')

	<div class="container">

		{{-- This shows one review without providing links to edit or delete it --}}
		
		<div class="panel panel-default">
			
			<div class="panel-heading text-center">
				<h1>
					{{ $review->user->name }}'s review of
					<a href="{{ url('showProtectedDeck', [$review->deck_id]) }}">
						{{ $review->deck->title }}
					</a>
				</h1>
				<div class="row">
					<div class="col-sm-6">
						<p>{{ date('n/j/y g:i a', strtotime($review->published_at)) }}</p>
					</div>
					<div class="col-sm-6">
						@for($i = 1; $i <= $review->rating; $i++)
							<span class="glyphicon glyphicon-star"></span>
						@endfor

						@for($i = $review->rating + 1; $i <= 5 ; $i++)
							<span class="glyphicon glyphicon-star-empty"></span>
						@endfor
					</div>
				</div>

			</div>
			
			<div class="panel-body text-center">
				<h3>{{ $review->title }}</h3>
				<hr/>
				<h5>{{ $review->body }}</h5>
			</div>

		</div>

	</div>

@stop