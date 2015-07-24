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
			  <div class="panel-heading">
			  	<a href="{{ url('/decks') }}">
			    	<h3 class="panel-title">Decks</h3>
			    </a>
			  </div>
			  <div class="panel-body">
			    @if(count($decks))
					<table class="table">
						<tr>
							<th>Title</th>
							<th>Rating</th>
							<th>Subject</th>
							<th>Private</th>
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
							</tr>
						@endforeach
					</table>
				@endif
			  </div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <a href="{{ url('/reviews') }}">
			    	<h3 class="panel-title">Reviews</h3>
			    </a>
			  </div>
			  <div class="panel-body">
			    @if(count($reviews))
					<table class="table">
						<tr>
							<th>Title</th>
							<th>Rating</th>
							<th>Body</th>
							<th>Published At</th>
						</tr>
						@foreach ($reviews as $review)
							<tr>
								<td><a href="{{ url('reviews', [$review->id]) }}">{{ $review->title }}</a></td>
								<td>{{ $review->rating }}</td>
								<td>{{ $review->body }}</td>
								<td>{{ $review->published_at }}</td>
							</tr>
						@endforeach
					</table>
				@endif
			  </div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
			    <div class="panel-heading">
				  	<a href="{{ url('/notes') }}">
				    	<h3 class="panel-title">Notes</h3>
				    </a>
			    </div>
			    <div class="panel-body">
				    @if(count($notes))
						<table class="table">
							<tr>
								<th>Body</th>
								<th>Score</th>
								<th>Published At</th>
							</tr>
							@foreach ($notes as $note)
								<tr>
									<td>{{ $note->body }}</td>
									<td>{{ $note->score }}</td>
									<td>{{ $note->published_at }}</td>
								</tr>
							@endforeach
						</table>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <a href="{{ url('/posts') }}">	
		    	<h3 class="panel-title">Posts</h3>
		    </a>
		  </div>
		  <div class="panel-body">
		    @if(count($posts))
				<table class="table">
					<tr>
						<th>Title</th>
						<th>Body</th>
						<th>Topic</th>
						<th>Score</th>
						<th>Published At</th>
					</tr>
					@foreach ($posts as $post)
						<tr>
							<td><a href="{{ url('posts', [$post->id]) }}">{{ $post->title }}</a></td>
							<td>{{ $post->body }}</td>
							<td>{{ $post->topic }}</td>
							<td>{{ $post->score }}</td>
							<td>{{ $post->published_at }}</td>
						</tr>
					@endforeach
				</table>
			@endif
		  </div>
		</div>
		</div>

		<div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <a href="{{ url('/comments') }}">
		    	<h3 class="panel-title">Comments</h3>
		    </a>
		  </div>
		  <div class="panel-body">
		     @if(count($comments))
				<table class="table">
					<tr>
						<th>Body</th>
						<th>Score</th>
						<th>Published At</th>
					</tr>
					@foreach ($comments as $comment)
						<tr>
							<td>{{ $comment->body }}</td>
							<td>{{ $comment->score }}</td>
							<td>{{ $comment->published_at }}</td>
						</tr>
					@endforeach
				</table>
			@endif
		  </div>
		</div>
		</div>
	</div>

</div>

@stop