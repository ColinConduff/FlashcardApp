<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('rating', 'Rating:') !!}
	{!! Form::text('rating', null, ['class' => 'form-control']) !!}
</div>

<div hidden=true class="form-group">
	{!! Form::label('deck_id', 'Deck id:') !!}
	{!! Form::text('deck_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>