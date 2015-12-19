<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
      {{-- Yield the title if it exists, otherwise default to 'Recipe App Name' --}}
      @yield('title','Digital Recipe Box')
    </title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Additional Styling -->
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href="/css/style.css" rel="stylesheet">

    {{-- page specific styling --}}
    @yield('styling')
  </head>

  <body>
    @if(\Session::has('flash_message'))
      <div class='flash_message'>
        {{ \Session::get('flash_message') }}
      </div>
    @endif

    <!-- Navigation -->
    <nav class="navbar navbar-nav navbar-fixed-top navbar-inverse">
      <div class="container">
        <a href="/" class="navbar-brand">Recipe Box</a>
        <ul class="nav navbar-nav pull-right">
          @if(Auth::check())
            <li><a href="/recipe/show">My Recipes</a></li>
            <li><a href="/recipe/create">Add Recipe</a></li>
            <li><a href='/logout'>Log out</a></li>
          @else
            <li><a href='/'>Home</a></li>
            <li><a href='/login'>Log in</a></li>
            <li><a href='/register'>Register</a></li>
          @endif
        </ul>
      </div>
    </nav>

    <!-- Body -->
    <section>
      <div class="container">
        {{-- Main content for each page --}}
        @yield('content')
      </div>
    </section>

    <!-- Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/recipe.js"></script>

  </body>
</html>
