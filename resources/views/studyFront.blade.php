@extends('study')

@section('studyContent')
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title text-center">Front</h3>
		</div>
		<div class="panel-body text-center" style="height:300px;">
			<div class="row">
				<div class="col-xs-4">Number of Attempts: {{ $flashcard->number_of_attempts }}</div>
	        	<div class="col-xs-4">Number Correct: {{ $flashcard->number_correct }}</div>
	        	<div class="col-xs-4">Attempts / Number Correct: {{ $flashcard->ratio_correct }}</div>
	        </div>
			
			<div class="row text-center"><h1>{{ $flashcard->front }}</h1></div>
		</div>
		<div class="panel-footer" style="text-align:right">
			<a href="{{ url('studyBack', [$flashcard->id]) }}">View Back</a>
		</div>
	</div>

@stop