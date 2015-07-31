<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('subject', 'Subject:') !!}
	{!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('private', 'Private:') !!}
	{!! Form::radio('private', 1, true, ['class' => 'field']) !!}
	{!! Form::label('private', 'Public:') !!}
	{!! Form::radio('private', 0, false, ['class' => 'field']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
