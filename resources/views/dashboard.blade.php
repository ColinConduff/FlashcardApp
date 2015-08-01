@extends('app')

@section('content')

{{-- The following are bootstrap navigation components called pills. --}}

<div class="container">
	<ul class="nav nav-pills nav-justified">
	  <li role="presentation"><a href="{{ url('/decks') }}">Decks</a></li>
	  <li role="presentation"><a href="{{ url('/reviews') }}">Reviews</a></li>
	  <li role="presentation"><a href="{{ url('/notes') }}">Notes</a></li>
	  <li role="presentation"><a href="{{ url('/posts') }}">Posts</a></li>
	  <li role="presentation"><a href="{{ url('/comments') }}">Comments</a></li>
	</ul>
</div>

{{-- 
	 The following lines print out all of the user's data relating to
	 their decks, reviews, notes, posts, and comments
--}}

<div class="container">

	<h1 class="text-center">Welcome, {{$user->name}}</h1>
	<hr/>

	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
			  	<div class="panel-heading text-center">
			  		<a href="{{ url('/decks') }}">
			    		<h3 class="panel-title">Decks</h3>
			    	</a>
			  	</div>
			    @if(count($decks))
					<table class="table">
						@foreach ($decks as $deck)
							<tr>
								<td><span class="badge">{{ $deck->average_rating }}</span></td>
								<td><a href="{{ url('decks', [$deck->id]) }}">{{ $deck->title }}</a></td>
								<td>{{ $deck->subject }}</td>
								<td>
									@if ( $deck->private )
										Private
									@else
										Public
									@endif
								</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
			 	 <div class="panel-heading text-center">
				    <a href="{{ url('/reviews') }}">
				    	<h3 class="panel-title">Reviews</h3>
			    	</a>
			  	</div>
			    @if(count($reviews))
					<table class="table">
						@foreach ($reviews as $review)
							<tr>
								<td><span class="badge">{{ $review->rating }}</span></td>
								<td><a href="{{ url('reviews', [$review->id]) }}">{{ $review->title }}</a></td>
								<td class="text-center">{{ date('n/j/y', strtotime($review->published_at)) }}</td>
							</tr>
						@endforeach
					</table>
				@endif
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
			    <div class="panel-heading text-center">
				  	<a href="{{ url('/notes') }}">
				    	<h3 class="panel-title">Notes</h3>
				    </a>
			    </div>
				    @if(count($notes))
						<table class="table">
							@foreach ($notes as $note)
								<tr>
									<td class="text-center"><span class="badge">{{ $note->score }}</span></td>
									<td>{{ $note->body }}</td>
									<td class="text-center">{{ date('n/j/y', strtotime($note->published_at)) }}</td>
								</tr>
							@endforeach
						</table>
					@endif
			</div>
		</div>

		<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading text-center">
		    <a href="{{ url('/posts') }}">	
		    	<h3 class="panel-title">Posts</h3>
		    </a>
		  </div>
		    @if(count($posts))
				<table class="table">
					@foreach ($posts as $post)
						<tr>
							<td class="text-center"><span class="badge">{{ $post->score }}</span></td>
							<td><a href="{{ url('posts', [$post->id]) }}">{{ $post->title }}</a></td>
							<td class="text-center">{{ date('n/j/y g:i a', strtotime($post->published_at)) }}</td>
						</tr>
					@endforeach
				</table>
			@endif
		</div>
		</div>

		<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading text-center">
		    <a href="{{ url('/comments') }}">
		    	<h3 class="panel-title">Comments</h3>
		    </a>
		  </div>
		     @if(count($comments))
				<table class="table">
					@foreach ($comments as $comment)
						<tr>
							<td class="text-center"><span class="badge">{{ $comment->score }}</span></td>
							<td>{{ $comment->body }}</td>
							<td class="text-center">{{ date('n/j/y g:i a', strtotime($comment->published_at)) }}</td>
						</tr>
					@endforeach
				</table>
			@endif
		</div>
		</div>
	</div>

</div>

@stop