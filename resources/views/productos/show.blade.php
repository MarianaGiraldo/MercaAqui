@extends('layouts.app')
@section('content')
<br><br><br>
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br>
        <br>
        <br>
        <div class="card-panel orange lighten-3 w-50 m-auto p-1 rounded h-50">
            <div class="col s12">
                <h2 class="header center-align"> {{$producto->nombre}} </h2>
                <div class="row card w-100 mx-auto">
                    <div class="card-image col s4">
                        <img src="/imagenes/productos/{{$producto->imagen}}">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p class="m-2">Nombre: {{$producto->nombre}} </p>
                            <p class="m-2">Tipo: {{$producto->tipo}} </p>
                            <p class="m-2">Precio: {{$producto->precio}} </p>
                            <p class="m-2">Cantidad Disponible: {{$producto->cantidad_disponible}} </p>
                        </div>
                        <div class="card-action">
                            <a href="/productos/{{$producto->id}}/edit" class="btn blue lighten-3">Editar</a>
                            <a href="/productos/{{$producto->id}}/drop" class="btn amber lighten-3">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 offset-md-5">
                <a href="/productos" class="waves-effect waves-light light-blue lighten-2 btn">{{ __('Regresar') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
