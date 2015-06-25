@extends('app')

@section('content')

<div class="container">
	<h1 class="text-center">Welcome, {{ $name }}</h1>
	<hr/>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">
	    	Decks
	    	<button type="button" class="btn btn-primary pull-right">Create</button>
		</h3>
	  </div>
	  <div class="panel-body">
	    {{-- @include('decks.showAll') --}}
	    <div class="row">
		    <div class="col-md-6">
			    <h4>Test 1 <small>- private</small></h4>
			    <h5>Subject:  Databases</h5>
			    <h5>Average Rating: 3</h5> 
			</div>
		    <div class="col-md-6">
		    	<button type="button" class="btn btn-info pull-right">Edit</button>
		    	<button type="button" class="btn btn-danger pull-right">Delete</button>
	    	</div>
	    </div>
	    <hr/>
	    <div class="row">
	    	<div class="col-md-6">
		    	<h4>Test 2 <small>- public</small></h4>
		    	<h5>Subject:  Algorithms</h5>
		    	<h5>Average Rating: 4</h5>
		   	</div>
		    <div class="col-md-6">
		    	<button type="button" class="btn btn-info pull-right">Edit</button>
		    	<button type="button" class="btn btn-danger pull-right">Delete</button>
	    	</div>
	    </div>
	    <hr/>
	    <div class="row">
	    	<div class="col-md-6">
		    	<h4>Test 3 <small>- public</small></h4>
		    	<h5>Subject:  Discrete Math</h5>
		    	<h5>Average Rating: 2</h5>
		    </div>
		    <div class="col-md-6">
		    	<button type="button" class="btn btn-info pull-right">Edit</button>
		    	<button type="button" class="btn btn-danger pull-right">Delete</button>
	   		</div>
	    </div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Posts</h3>
	  </div>
	  <div class="panel-body">
	    {{-- @yield('postsContent') --}}
	    <div>
		    <h4>Who would like to collaborate on a deck for Algorithms?</h4>
	    	<div>
	    		<h5><small>Topic: Algorithms Score: 122 Published: June 20th, 2015</small></h5>
	    	</div>
	    	<p>
	    		I am creating a deck to study algorithms.  
	    	    If you would like to become a collaborator, please 
	    	    send me a request.  I will only be allowing people 
	    	    to edit flashcards at this time.
	    	</p> 
    	</div>
    	<hr/>
    	<div>
		    <h4>Who would like to collaborate on a deck for Databases?</h4>
	    	<div>
	    		<h5><small>Topic: Databases Score: 101 Published: June 22nd, 2015</small></h5>
	    	</div>
	    	<p>
	    		I am creating a deck to study database concepts.  
	    	    If you would like to become a collaborator, please 
	    	    send me a request.  I will only be allowing people 
	    	    to edit flashcards at this time.
	    	</p> 
    	</div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Comments</h3>
	  </div>
	  <div class="panel-body">
	    {{-- @yield('commentsContent') --}}
	    <div>
		    <h4>Tips for creating a great deck of flashcards!<small> by OtherUser</small></h4>
	    	<p>
	    		Comment: Thanks for the great tips OtherUser!
	    	</p> 
	    	<div>
	    		<h5><small>Score: 101 Published: June 22nd, 2015</small></h5>
	    	</div>
    	</div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Reviews</h3>
	  </div>
	  <div class="panel-body">
	    {{-- @yield('reviewsContent') --}}
	    <div>
		    <h4>Review of:  SpanishDeck <small>by AnotherUser</h4>
	    	<h5>
	    		Title:  AnotherUser's SpanishDeck is mediocre at best!
	    	</h5>
	    	<div>
	    		<h5><small>Rating: 3 Published: June 22nd, 2015</small></h5>
	    	</div> 
	    	<h6>
	    		Several of the flashcards in AnotherUser's SpanishDeck have errors!
	    	</h6>
    	</div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Notes</h3>
	  </div>
	  <div class="panel-body">
	    {{-- @yield('notesContent') --}}
	    <div>
		    <h4>Flashcard: "Como estas?"<small> by OtherUser on deck: SpanishDeck</small></h4>
	    	<p>
	    		Note: The answer is incorrect! Please change it OtherUser!
	    	</p> 
	    	<div>
	    		<h5><small>Score: 201 Published: June 22nd, 2015</small></h5>
	    	</div>
    	</div>
	  </div>
	</div>

</div>

@stop