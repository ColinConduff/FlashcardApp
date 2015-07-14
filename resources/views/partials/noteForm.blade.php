<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<div hidden=true class="form-group">
	{!! Form::label('flashcard_id', 'Flashcard_id:') !!}
	{!! Form::text('flashcard_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>