@extends('layouts.app')
@section('content')
@role('Admin')
<div class="parallax-index">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row  d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0 mb-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:30%; right:50%; left:25%; transform: translateY(-25%);">
                                    <i class="fa-solid fa-person-circle-plus text-center" alt="User-Profile-Image" style="font-size:7rem;"></i>     
                                </div>
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:45%; left:17%;">
                                    <h4 class="f-w-600 text-center">Nuevo Vendedor</h4>
                                </div>
                            </div>
                            <div class="col-sm-8 pt-4">
                            <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Crear Vendedor</h5>
                                <form method="POST" action="/usuarios">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="nombre"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                        <div class="col-md-6">
                                            <input id="nombre" type="text"
                                                class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                                value="" required autocomplete="nombre" autofocus>
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="apellido"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                                        <div class="col-md-6">
                                            <input id="apellido" type="text"
                                                class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                                value="" required autocomplete="apellido" autofocus>

                                            @error('apellido')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="text"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="celular"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>
                                        <div class="col-md-6">
                                            <input id="celular" type="text"
                                                class="form-control @error('celular') is-invalid @enderror" name="celular"
                                                value="" required autocomplete="celular" autofocus>
                                            @error('celular')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fecha_nacimiento"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>
                                        <div class="col-md-6">
                                            <input id="fecha_nacimiento" type="date"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                name="fecha_nacimiento" value="" required
                                                autocomplete="fecha_nacimiento" autofocus>

                                            @error('fecha_nacimiento')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        @role('Vendedor')
                                            <script>
                                                $("#password").attr("required", "true");
                                                $("#password-confirm").attr("required", "true");
                                            </script>
                                        @endrole
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="py-4">
                                        <a href=""
                                            class="waves-effect waves-light btn text-white" style="background-color: #FF9B42">Regresar</a>
                                        <button type="submit" class="waves-effect waves-light btn float-right text-white" style="background-color: #71A9F7">
                                            {{ __('Crear') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
@include('components.authAlert')
@endrole
@endsection
