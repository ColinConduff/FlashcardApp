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

			<div class="panel-footer">
				<div class="row">
					<div class="col-xs-6">
						<a href="{{ url('reviews', [$review->id, 'edit']) }}" class="btn btn-info btn-block">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</div>
					<div class="col-xs-6">
						{!! Form::open(array('url' => 'reviews/' . $review->id)) !!}
		                    {!! Form::hidden('_method', 'DELETE') !!}
		                    {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', array('type' => 'submit', 'class' => 'btn btn-danger btn-block')) !!}
		                {!! Form::close() !!}
	                </div>
               	</div>
            </div>

		</div>

	</div>

@stop