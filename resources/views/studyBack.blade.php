@extends('study')

@section('studyContent')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title text-center">Back</h3>
		</div>
		<div class="panel-body text-center" style="height:100px">
			This is the back content of a flashcard
		</div>
		<div class="panel-footer">
			<table style="width:100%">
				<tr>
					<td>
						<a href="{{ url('/studyFront') }}" style="text-align:right">
							View Front
						</a>
					</td>
					<td>
						<button type="button" class="btn btn-danger btn-lg btn-block">Incorrect!</button>
					</td>
					<td>
						<button type="button" class="btn btn-success btn-lg btn-block">Correct!</button>
					</td>
				<tr>
			</table>
		</div>
	</div>

@stop