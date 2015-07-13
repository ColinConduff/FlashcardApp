<div class="form-group">
	{!! Form::label('front', 'Front:') !!}
	{!! Form::text('front', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('back', 'Back:') !!}
	{!! Form::text('back', null, ['class' => 'form-control']) !!}
</div>

<div hidden=true class="form-group">
	{!! Form::label('deck_id', 'Deck_id:') !!}
	{!! Form::text('deck_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>