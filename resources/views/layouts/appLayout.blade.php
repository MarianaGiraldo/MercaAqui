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
    <script src="{{URL::asset('js/app.js')}} "></script>
    <title>Merca Aqui</title>
    <style>
        @isset($fondo)
        .parallax-index{
            background-image: url('imagenes/{{$fondo}}');
            width: 100%;
            height: 100vh;
            background-attachment: fixed;
            background-size: cover;
        }
        @endisset
        @font-face { font-family: MarkingPen; src: url('font/Marking Pen.ttf'); }
    </style>
</head>
<body>
    <nav class="" role="navigation" style="background-color: #1d80f7">
        <div class="nav-wrapper container">
            <img src="logo/logo.png" alt="logo" style="width: 15vh">
          <a id="logo-container" href="/" class="brand-logo" style="font-family: MarkingPen; color:#f7941d; font-size: 10vh">Merca Aqui</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/usuarios">Usuarios</a></li>
          </ul>

          <ul id="nav-mobile" class="sidenav">
            <li><a href="#">Navbar Link</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">Menu</i></a>
        </div>
    </nav>

    <div class="parallax-container">
      <div class="parallax-index"></div>
  </div>
  <div class="container">
     @yield('content')
  </div>

</body>
</html>
