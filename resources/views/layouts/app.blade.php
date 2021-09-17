<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Merca Aquí') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Materialize -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @isset($fondo) .parallax-index {
            background-image: url('/imagenes/{{$fondo}}');
            width: 100%;
            height: 100vh;
            background-attachment: fixed;
            background-size: cover;
        }

        @endisset @font-face {
            font-family: MarkingPen;
            src: url('/font/Marking Pen.ttf');
        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm " role="navigation"
            style="background-color: #1d80f7; height: 12vh">
            <div class="container">
                <div class="row mt-2 pt-1">
                    <img src="/logo/logo.png" alt="logo" style="width: 17vh" class="col">
                    <a id="logo-container" href="/" class=" navbar-brand col"
                        style="font-family: MarkingPen; color:#f7941d; font-size: 10vh">Merca Aqui</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/usuarios">Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/ventas">Ventas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                style="font-family: MarkingPen; color:#f7941d; font-size: 5vh">
                                {{ Auth::user()->nombre }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mt-0">
            @yield('content')
        </main>
        <footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Merca aqui</h5>
        <ul>
          <li><a class="grey-text text-lighten-4" href="/productos"><i class="tiny material-icons">check</i> Productos</a></li>
          <li><a class="grey-text text-lighten-4" href="/usuarios"><i class="tiny material-icons">check</i> Vendedores</a></li>
          <li><a class="grey-text text-lighten-4" href="/ventas"><i class="tiny material-icons">check</i> Ventas</a></li>
        </ul>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Contactenos</h5>
        <ul>
          <li>
              <a class="grey-text text-lighten-3" href="#!"><i class="tiny material-icons">home</i> Cra 9 # 11-26 </a>
            </li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="tiny material-icons">settings_cell</i> 319587458</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="tiny material-icons">local_phone</i> 8258745</a></li>
          <li><a class="grey-text text-lighten-3" href="#!"><i class="tiny material-icons">email</i> infomercaaqui@gmail.com</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2021 Todos los derechos reservados
    </div>
  </div>
</footer>
    </div>
</body>

</html>
