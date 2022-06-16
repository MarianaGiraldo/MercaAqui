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

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Jquery Format Number -->
    <script src="{{ asset('js/formatNumber.js') }}"></script>

    <!-- Materialize -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/4ed93febb8.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invoicer.css') }}" rel="stylesheet">
    <style>
        @import url('/font/Akshar/Akshar-Regular.ttf');

        @isset($fondo) .parallax-index {
                background-image: url('/imagenes/{{ $fondo }}');
                width: 100%;
                height: 100vh;
                background-attachment: fixed;
                background-size: cover;
            }

        @endisset @font-face {
            font-family: 'Akshar', sans-serif;
            src: url('/font/Akshar/Akshar-Regular.ttf');
        }

        #logo-container {
            font-size: 4rem;
        }
        #navbar-container {
            margin-left: 3rem;
            margin-right: 3rem;
        }
        #nav-logo {
            width:6rem;
            height:100%;
        }
        .table-title {
            padding-top: 1rem;
        }

        table, .table {
            table-layout: fixed;
            overflow-wrap: break-word;
        }

        .id-col-table {
            width: 7%;
        }

        @media only screen and (max-width: 600px) {
            /* For mobile phones: */
            #logo-container {
                font-size: 2rem;
            }
            #navbar-container {
                margin-left: 0;
                margin-right: 1rem;
            }
            #nav-logo {
                width:4rem;
                height:80%;
            }
            .nav-item {
                position: relative;
                width: 100%;
                flex-basis: 0;
                flex-grow: 1;
                max-width: 100%;
            }
        }
        @media only screen and (max-width: 768px) {
            .btn-small {
                font-size: 0.7rem;
                padding-top: 0
            }

        }
    </style>
</head>

<body style="margin: 0">
    <div id="app" style="min-height: 100vh">
        <nav class="navbar navbar-expand-lg justify-content-between fixed-top w-100 d-inline" role="navigation"
            style="background-color: #2B4162; height: 80px">
            <div id="navbar-container" class="d-flex mt-0 h-100 w-100" >
                <img id="nav-logo" src="/logo/logo.png" alt="logo" style="" class="mx-0 my-auto">
                <a id="logo-container" href="/" class=" navbar-brand col m-0"
                    style="font-family: Akshar; color:#ff9b42;">Merca Aqui</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon " style="color:#ff9b42;"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto float-right" style="display:inline-block; right:10%;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item p-0 mx-2" style="background-color: #2B4162;">
                                    <a class="nav-link p-0" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item p-0 mx-2" style="background-color: #2B4162;">
                                    <a class="nav-link p-0" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            @role('Admin')
                                <li class="nav-item p-0 mx-2" style="background-color: #2B4162;">
                                    <a class="nav-link p-0" href="/usuarios">Vendedores</a>
                                </li>
                            @endrole
                            <li class="nav-item p-0 mx-2" style="background-color: #2B4162;">
                                <a class="nav-link p-0" href="/productos">Productos</a>
                            </li>
                            <li class="nav-item p-0 mx-2" style="background-color: #2B4162;">
                                <a class="nav-link p-0" href="/ventas">Ventas</a>
                            </li>
                            <li class="nav-item p-0 mx-2 dropdown" style="background-color: #2B4162;">
                                <a id="navbarDropdown" class="nav-link p-0 dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    style="font-family: Akshar; color:#ff9b42; font-size: 30px">
                                    {{ Auth::user()->nombre }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="/usuarios/{{ Auth::user()->id }}">Mi perfil </a>
                                </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="h-100 d-block" style="padding-top: 80px; min-height: 93vh">
            @yield('content')
        </main>
        <footer class="page-footer float-bottom" style="background-color: #2B4162; position: relative;">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h5 style="font-family: Akshar; color:#ff9b42; font-size: 30px">Merca aqui</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-4" href="/productos"><i class="tiny material-icons"
                                        style="color:#ff9b42">check</i> Productos</a></li>
                            <li><a class="grey-text text-lighten-4" href="/usuarios"><i class="tiny material-icons"
                                        style="color:#ff9b42">check</i> Vendedores</a></li>
                            <li><a class="grey-text text-lighten-4" href="/ventas"><i class="tiny material-icons"
                                        style="color:#ff9b42">check</i> Ventas</a></li>
                        </ul>
                    </div>
                    <div class="col-6 align-right text-right">
                        <h5 style="font-family: Akshar; color:#ff9b42; font-size: 30px">Contáctenos</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Cra 9 # 11-26 <i
                                        class="mx-1 fa-solid fa-house" style="color:#ff9b42"></i></a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">319587458<i
                                        class="mx-1 fa-solid fa-mobile" style="color:#ff9b42"></i></a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">8258745</a><i
                                    class="mx-1 fa-solid fa-phone-flip" style="color:#ff9b42"></i></li>
                            <li><a class="grey-text text-lighten-3" href="#!">infomercaaqui@gmail.com<i
                                        class="mx-1 fa-solid fa-envelope" style="color:#ff9b42"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Grid container -->
            <div class="container p-2 pb-0 text-center text-white">
                <!-- Section: Social media -->
                <section class="mb-1">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating mx-3 p-0 rounded-circle" href="#!" role="button"><i
                            class="fab fa-facebook-f" style="font-size: 15px"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating mx-3 p-0 rounded-circle" href="#!" role="button"><i
                            class="fab fa-twitter" style="font-size: 15px"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating mx-3 p-0 rounded-circle" href="#!" role="button"><i
                            class="fab fa-google" style="font-size: 15px"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating mx-3 p-0 rounded-circle" href="#!" role="button"><i
                            class="fab fa-instagram" style="font-size: 15px"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating mx-3 p-0 rounded-circle" href="#!" role="button"><i
                            class="fab fa-linkedin-in" style="font-size: 15px"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating mx-3 p-0 rounded-circle" href="#!" role="button"><i
                            class="fab fa-github" style="font-size: 15px"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Copyright:
                <a class="text-white" href="https://github.com/MarianaGiraldo/MercaAqui">MercaAqui</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>

    <script>
        $('#img').on('change', function() {
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.file-label').html(fileName);
        })

        $('#img').on('change', function() {
            //get the file name
            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
            //replace the "Choose a file" label
            $(this).next('.file-label-white').html(fileName);
        })

        //produces 29,323,894.23 (e.g. US standard)
        $('.number').formatNumber({
            cents: ',',
            decimal: '.'
        });
    </script>
</body>

</html>
