@extends('layouts.app')
@section('content')
<div class="container">
    <div class="">
        <h2 class="header center-align"> {{$producto->nombre}} </h2>
        <div class="card horizontal">
            <div class="card-image">
                <img src="/imagenes/productos/{{$producto->img}}" width="100" height="190">
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
        <a href="/productos" class="waves-effect waves-light light-blue lighten-2 btn">{{ __('Regresar') }}</a>
    </div>
</div>
@endsection