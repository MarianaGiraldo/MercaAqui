@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col s12">
        <h2 class="header center-align"> {{$producto->nombre}} </h2>
        <div class="row card w-50 mx-auto">
            <div class="card-image col s6">
                <img src="/imagenes/productos/{{$producto->img}}" width="90" height="150">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p>Nombre: {{$producto->nombre}} </p>
                    <p>Tipo: {{$producto->tipo}} </p>
                    <p>Precio: {{$producto->precio}} </p>
                    <p>Tipo: {{$producto->tipo}} </p>
                    <p>Cantidad Disponible: {{$producto->cantidad_disponible}} </p>
                </div>
                <div class="card-action">
                    <a href="/productos/{{$producto->id}}/edit">Editar</a>
                    <a href="/productos/{{$producto->id}}/drop">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 offset-md-5">
        <a href="/productos" class="waves-effect waves-light light-blue lighten-2 btn">{{ __('Regresar') }}</a>
    </div>
</div>
@endsection