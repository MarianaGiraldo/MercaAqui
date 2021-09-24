@extends('layouts.app')
@section('content')
@role('Admin')
<br><br><br>
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br>
        <div class="w-50 m-auto p-1 rounded">
            <div class="card teal lighten-3">
                <div class="card-content white-text">
                    <h1 class="card-title fw-bold">Información del vendedor {{$user->id}}</h1>
                    <br>
                    <h5 class="col d-inline">Nombre:</h5>
                    <p class="col d-inline">{{$user->nombre}}</p>
                    <br><br>
                    <h5 class="col d-inline">Apellido:</h5>
                    <p class="col d-inline">{{$user->apellido}}</p>
                    <br><br>
                    <h5 class="col d-inline">Correo:</h5>
                    <p class="col d-inline">{{$user->email}}</p>
                    <br><br>
                    <h5 class="col d-inline">Celular:</h5>
                    <p class="col d-inline">{{$user->celular}}</p>
                    <br><br>
                    <h5 class="col d-inline">Fecha de nacimiento:</h5>
                    <p class="col d-inline">{{$user->fecha_nacimiento}}</p>
                </div>
                <div class="card-action">
                    <a href="/usuarios/{{$user->id}}/edit" class="waves-effect waves-light btn-success btn">Editar</a>
                    <a href="/usuarios/{{$user->id}}/drop"
                        class="waves-effect waves-light btn right btn-danger">Borrar</a>
                </div>
                <a href="/usuarios" class="waves-effect waves-light btn btn-warning">Regresar</a>
            </div>

        </div>
    </div>
</div>
@else
<br><br>
<div class="row center container w-50 m-auto">
    <div class="col s6 m6">
        <div class="card red lighten-2">
            <div class="card-content white-text">
                <span class="card-title">No estas autorizado para esta vista.</span>
            </div>
            <div class="card-action">
                <a href="/" class="waves-effect waves-light btn blue lighten-3">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endrole
@endsection
