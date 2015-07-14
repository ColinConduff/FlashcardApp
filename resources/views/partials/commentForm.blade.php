<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<div hidden=true class="form-group">
	{!! Form::label('post_id', 'Post_id:') !!}
	{!! Form::text('post_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>