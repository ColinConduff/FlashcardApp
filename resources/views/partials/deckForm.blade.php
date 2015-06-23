<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('subject', 'Subject:') !!}
	{!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('average_rating', 'Average Rating:') !!}
	{!! Form::text('average_rating', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('private', 'Private:') !!}
	{!! Form::text('private', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
