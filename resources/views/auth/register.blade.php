@extends('app')

@section('content')
<div class="container">
    <h1>Register</h1>
    <hr/>

    <form class="form-group" method="POST" action="/auth/register">
        
        @include('errors.list')

        {!! csrf_field() !!}

        <div class="col-md-6">
            Name
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            Password
            <input type="password" name="password">
        </div>

        <div class="col-md-6">
            Confirm Password
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</div>
@stop