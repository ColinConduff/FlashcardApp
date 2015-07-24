<!doctype html>
<html lang="en">
<head>
    <meta charset= "UTF-8" >
    <title>Flashcards App</title>
    
    {{-- The following includes bootstrap css and javascript files and jquery --}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</head>
<body>

  {{-- The following lines create a bootstrap navigation bar along the top of the app --}}
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Flashcards App</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
          <li><a href="{{ url('/study') }}">Study</a></li>
          <li><a href="{{ url('/browseTitleDesc') }}">Browse</a></li>
          <li><a href="{{ url('/forumPostDesc') }}">Forum</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li><a href="{{ url('auth/logout') }}">Logout</a></li>
        @else
          <li><a href="{{ url('auth/login') }}">Login</a></li>
          <li><a href="{{ url('auth/register') }}">Register</a></li>
        @endif
        </ul>
      </div>
    </div>
  </nav>

  {{-- This includes html/css from other files --}}
  @yield('content')
  
</body>
</html>