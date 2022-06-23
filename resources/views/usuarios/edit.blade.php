@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div class="parallax-index">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row  d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0 mb-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:25%; transform: translateY(-25%);">
                                    <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h4 class="f-w-600">{{$user->nombre}} {{$user->apellido}}</h4>
                                    @if($user->is_admin)
                                    <p>Administrador</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    @else
                                    <p>Vendedor</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-8 pt-4">
                                @if($user->is_admin)
                                <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información del Administrador No. {{$user->id}}</h5>
                                @else
                                <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información del Vendedor No. {{$user->id}}</h5>
                                @endif
                                <form action="/usuarios/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                        <div class="col-md-6">
                                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $user->nombre }}" required autocomplete="nombre" autofocus>

                                            @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                                        <div class="col-md-6">
                                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ $user->apellido }}" required autocomplete="apellido" autofocus>

                                            @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="celular" class="col-md-4 col-form-label text-md-right">{{ __('Celular') }}</label>

                                        <div class="col-md-6">
                                            <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ $user->celular }}" required autocomplete="celular" autofocus>

                                            @error('celular')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>

                                        <div class="col-md-6">
                                            <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}" required autocomplete="fecha_nacimiento" autofocus>

                                            @error('fecha_nacimiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @role('Admin')
                                    @if (Auth::user()->id != $user->id)
                                    <div class="form-group row">
                                        <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('¿Es administrador?') }}</label>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <select class="browser-default" id="is_admin" name="is_admin">
                                                    <option value="" disabled selected>Tipo de usuario</option>
                                                    <option value="true">Administrador</option>
                                                    <option value="false">Vendedor</option>
                                                </select>
                                            </div>

                                            @error('is_admin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                    @endrole

                                    <div class="form-group row">
                                        @role('Vendedor')
                                        <script>
                                            $("#password").attr("required", "true");
                                            $("#password-confirm").attr("required", "true");
                                        </script>
                                        @endrole
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="checkbox-confirm" class="col-md-6 col-form-label ml-4"><input id="checkbox-confirm" type="checkbox" class="form-check-input text-right" name="checkbox_confirmation" style="opacity: 1; pointer-events: auto;" required> {{ __('Acepto manejo de datos personales') }}</label>
                                    </div>

                                    <div class="py-4">
                                        <a href="/usuarios/{{ $user->id }}" class="waves-effect waves-light btn text-white" style="background-color: #FF9B42">Regresar</a>
                                        <button type="submit" class="waves-effect waves-light btn float-right text-white" style="background-color: #71A9F7">
                                            {{ __('Guardar') }}
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
@endcan
@endsection