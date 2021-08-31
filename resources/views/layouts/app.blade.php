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
        .parallax-index{
            background-image: url('imagenes/fondo1.jpg');
            width: 100%;
            height: 100vh;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <nav class="green lighten-2" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="/" class="brand-logo">Inicio</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/usuarios">Usuarios</a></li>
          </ul>

          <ul id="nav-mobile" class="sidenav">
            <li><a href="#">Navbar Link</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


            @yield('content')


</body>
</html>
