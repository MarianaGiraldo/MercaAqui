@extends('layouts.app')
@section('content')
    @hasanyrole('Admin|Vendedor')
        <div class="parallax-index">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Editar usuario: {{ $user->nombre }} {{ $user->apellido }} </div>

                            <div class="card-body">
                                <form action="/usuarios/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row">
                                        <label for="nombre"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                        <div class="col-md-6">
                                            <input id="nombre" type="text"
                                                class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                                value="{{ $user->nombre }}" required autocomplete="nombre" autofocus>

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
                                                value="{{ $user->apellido }}" required autocomplete="apellido" autofocus>

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
                                                value="{{ $user->email }}" required autocomplete="email" autofocus>

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
                                                value="{{ $user->celular }}" required autocomplete="celular" autofocus>

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
                                                name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}" required
                                                autocomplete="fecha_nacimiento" autofocus>

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
                                                <label for="is_admin"
                                                    class="col-md-4 col-form-label text-md-right">{{ __('¿Es administrador?') }}</label>

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
                                    <div class="form-group row mb-0">
                                        <a href="/usuarios"
                                            class="waves-effect waves-light btn text-white" style="background-color: #FF9B42">Regresar</a>
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary float-right">
                                                {{ __('Guardar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
