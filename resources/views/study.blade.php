@extends('app')

@section('content')

	<div class="container">
		<h1 class="text-center">Study</h1>
		<hr/>

		@yield('studyContent')

		<form>

		<div class="well well-lg text-center"> 
		<div class="row">
		  <div class="col-sm-6">
		    <div class="checkbox">
			    <label>
			      <input type="checkbox"> DeckTitle1
			    </label>
			  </div>
		  </div><!-- /.col-sm-6 -->
		  <div class="col-sm-6">
		    <div class="checkbox">
			    <label>
			      <input type="checkbox"> DeckTitle2
			    </label>
			  </div>
		  </div><!-- /.col-sm-6 -->
		</div><!-- /.row -->
		<div class="row">
		  <div class="col-sm-6">
		    <div class="checkbox">
			    <label>
			      <input type="checkbox"> DeckTitle3
			    </label>
			  </div>
		  </div><!-- /.col-sm-6 -->
		  <div class="col-sm-6">
		    <div class="checkbox">
			    <label>
			      <input type="checkbox"> DeckTitle4
			    </label>
			  </div>
		  </div><!-- /.col-sm-6 -->
		</div><!-- /.row -->
		</div>

		<div>
			<button type="submit" class="btn btn-primary btn-lg btn-block">Study</button>
		</div>

		</form>

	</div>

@stop