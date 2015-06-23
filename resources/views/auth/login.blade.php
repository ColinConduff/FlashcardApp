@extends('app')

@section('content')
<div class="container">
    <form method="POST" action="/auth/login">
        <h1>Login</h1>
        <hr/>

        @include('errors.list')

        {!! csrf_field() !!}

        <div>
            Email
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            Password
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
@stop