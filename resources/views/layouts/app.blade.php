<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Merca Aqui</title>
</head>
<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="#" class="brand-logo">Logo</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Navbar Link</a></li>
          </ul>

          <ul id="nav-mobile" class="sidenav">
            <li><a href="#">Navbar Link</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>

      <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
          <div class="container">
            <br><br>
            <h1 class="header center teal-text text-lighten-2">Parallax Template</h1>
            <div class="row center">
              <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
            </div>
            <div class="row center">
              <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
            </div>
            <br><br>

          </div>
        </div>
        <div class="parallax"><img src="background1.jpg" alt="Unsplashed background img 1"></div>
      </div>

      <div class="container">
        <div class="section">
            @yield('content')
        </div>
      </div>

</body>
</html>
