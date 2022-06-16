@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div class="parallax-index" style="height: 100%;">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row  d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0 mb-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                    <h4 class="f-w-600">{{$user->nombre}} {{$user->apellido}}</h4>
                                    @if($user->is_admin)
                                    <p>Administrador</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    @else
                                    <p>Vendedor</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    @if($user->is_admin)
                                    <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información del Administrador No. {{$user->id}}</h5>
                                    @else
                                    <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información del Vendedor No. {{$user->id}}</h5>
                                    @endif
                                    <div class="row">
                                        <div class="col">
                                            <p class="m-b-10 f-w-600">Nombre Completo</p>
                                            <h6 class="text-muted f-w-400">{{$user->nombre}} {{$user->apellido}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Correo</p>
                                            <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Telefono</p>
                                                <h6 class="text-muted f-w-400">{{$user->celular}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Fecha de nacimiento</p>
                                                <h6 class="text-muted f-w-400">{{$user->fecha_nacimiento}}</h6>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="float-bottom w-100 pr-5">
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Acción</h6>
                                        <div class="row py-2">
                                            <div class="col-sm-4">
                                                <a href="/usuarios/{{ $user->id }}/edit"
                                                    class="d-block waves-effect waves-light btn text-white"
                                                    style="background-color: #71A9F7">Editar</a>
                                            </div>
                                            <div class="col-sm-4 px-3">
                                                <a href="/usuarios/{{ $user->id }}/drop"
                                                    class="d-block waves-effect waves-light btn btn-danger">Borrar</a>
                                            </div>
                                            <div class="col-sm-4">
                                                <a href="/usuarios"
                                                    class="d-block waves-effect waves-light btn text-white"
                                                    style="background-color: #ff9b42">Regresar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@endhasanyrole
@endsection
