@extends('app')

@section('content')

	<div class="container">
		<h1 class="text-center">Study</h1>
		<hr/>

		@yield('studyContent')

		@include('errors.list')

		{!! Form::open(['url' => 'studySelectedDecks']) !!}
		    {{--
			    <div hidden=true class="form-group">
					{!! Form::text('deck_id', $deck->id, ['class' => 'form-control']) !!}
				</div>
			--}}

		    <div class="form-group">
			    {!! Form::select('id[]', $decks, null, ['id' => 'deck_list', 'class' => 'form-control', 'multiple', 'style' => 'width:100%']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Study', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		{!! Form::close() !!}

	</div>

@stop