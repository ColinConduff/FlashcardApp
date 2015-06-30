@extends('study')

@section('studyContent')
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title text-center">Front</h3>
		</div>
		<div class="panel-body text-center" style="height:100px;">
			This is the front content of a flashcard
		</div>
		<div class="panel-footer" style="text-align:right">
			<a href="{{ url('/studyBack') }}">View Back</a>
		</div>
	</div>

@stop