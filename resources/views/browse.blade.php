@extends('app')

@section('content')

	<div class="container">
		
		<h1 class="text-center">Browse Decks</h1>
		<hr/>

		{{-- This implements a search bar that searches for deck titles --}}
	    @include('errors.list')
		
		<div class="row">
			{!! Form::open(['url' => 'browseSearchBar']) !!}
			    <div class="form-group col-sm-10">
					{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Deck Title']) !!}
				</div>

				<div class="form-group col-sm-2">
					{!! Form::submit('Submit', ['class' => 'btn btn-default form-control']) !!}
				</div>
			{!! Form::close() !!}
		</div>

		{{-- 
			This table contains links that filter the list of 
			public decks by various parameters
		--}}
		<table class="table table-striped" style="width:100%">
		  <tr>
		    <th>Title
		    	<a href="{{ url('browseTitleAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('browseTitleDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    </th>
		    <th>Username
		    	{{-- 
		    	<a href="{{ url('browseUsernameAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('browseUsernameDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    	--}}
		    </th> 
		    <th>Average Rating
		    	<a href="{{ url('browseRatingAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('browseRatingDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    </th>
		    <th>Subject
		    	<a href="{{ url('browseSubjectAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('browseSubjectDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    </th>
		    <th>Number of Flashcards
		    	{{-- 
		    	<a href="{{ url('browseFlashAsc') }}">
		    		<span class="glyphicon glyphicon-arrow-up"></span>
		    	</a>
		    	<a href="{{ url('browseFlashDesc') }}">
		    		<span class="glyphicon glyphicon-arrow-down"></span>
		    	</a>
		    	--}}
		    </th>
		  </tr>

		  {{-- 
		  		This prints out the deck's title, username, 
		  		rating, subject, and number of flashcards 
		  --}}
		  @foreach ($decks as $deck)
				<tr>
					<td><a href="{{ url('showProtectedDeck', [$deck->id]) }}">{{ $deck->title }}</a></td>
					<td>{{ $deck->user->name }}</td>
					<td>{{ $deck->average_rating }}</td>
					<td>{{ $deck->subject }}</td>
					<td>{{ $deck->flashcards->count() }}</td>
				</tr>
			@endforeach
		</table>

		<div class="text-center">{!! $decks->render() !!}</div>

	</div>

@stop