@extends('study')

@section('studyContent')

	{{-- 
		This shows the back content of the flashcard and allows 
		users to specify whether they got it correct or not.
	--}}

	<div class="panel panel-default">
		
		<div class="panel-heading">
			<h3 class="panel-title text-center">Back</h3>
		</div>
		
		<div class="panel-body text-center" style="height:300px;">
			<div class="row">
				<div class="col-xs-4">Number of Attempts: {{ $flashcard->number_of_attempts }}</div>
	        	<div class="col-xs-4">Number Correct: {{ $flashcard->number_correct }}</div>
	        	<div class="col-xs-4">Attempts / Number Correct: {{ $flashcard->ratio_correct }}</div>
	        </div>
			
			<div class="row text-center"><h1>{{ $flashcard->back }}</h1></div>
		</div>
		
		<div class="panel-footer" style="text-align:right">
			<a href="{{ url('correct', [$flashcard->id]) }}" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span></a>
			<a href="{{ url('incorrect', [$flashcard->id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
		</div>

	</div>

@stop