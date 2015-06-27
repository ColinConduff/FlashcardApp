<!doctype html>
<html lang="en">
<head>
    <meta charset= "UTF-8" >
    <title>Flashcards App</title>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- javascript is not working -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    

</head>
<body>

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
        <li><a href="{{ url('/dashboard') }}">Dashboard<span class="sr-only">(current)</span></a></li>
        <li><a href="{{ url('/browse') }}">Browse</a></li>
        <li><a href="{{ url('/forum') }}">Forum</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('auth/login') }}">Login</a></li>
        <li><a href="{{ url('auth/logout') }}">Logout</a></li>
        <li><a href="{{ url('auth/register') }}">Register</a></li>
      </ul>
    </div>
  </div>
</nav>

  @yield('content')
</body>
</html>