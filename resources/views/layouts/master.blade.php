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
    {{-- page specific styling --}}
    @yield('styling')
  </head>

  <body>
    <!-- Navigation -->
    <nav>
      <div class="container">
        <a href="/" class="navbar-brand">Digital Recipe Box</a>
        <ul class="nav nav-pills pull-right">
          <li><a href="/recipe/show">My Recipes</a></li>
          <li><a href="/recipe/create">Add Recipe</a></li>
        </ul>
      </div>
    </nav>

    <!-- Body -->
    <section>
      <div class="container">
        <div class="row">
          {{-- Main content for each page --}}
          @yield('content')
        </div>
      </div>
    </section>

    <!-- Footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>