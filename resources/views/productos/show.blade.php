@extends('layouts.app')
@section('content')
<div>
    <div class="parallax-index">
        <br><br><br>
        <div class="card-panel orange lighten-3 w-50 m-auto p-1 rounded h-auto my-auto" style="background-color: #c7efcf">
            <div class="col s12">
                <h2 class="header center-align"> {{$producto->nombre}} </h2>
                <div class="row card w-100 mx-auto">
                    <div class="card-image col s4">
                        <img src="/imagenes/productos/{{$producto->imagen}}" style="height: 200px;">
                    </div>
                    <div class="card-stacked py-1">
                        <div class="card-content">
                            <p class="m-2">Nombre: {{$producto->nombre}} </p>
                            <p class="m-2">Tipo: {{$producto->tipo}} </p>
                            <p class="m-2">Precio: {{$producto->precio}} </p>
                            <p class="m-2">Cantidad Disponible: {{$producto->cantidad_disponible}} </p>
                        </div>
                        <div class="card-content py-1">
                            <a href="/productos/{{$producto->id}}/edit" class="waves-effect waves-light text-white btn" style="background-color: #71a9f7">Editar</a>
                            <a href="/productos/{{$producto->id}}/drop" class="waves-effect waves-light text-white btn" style="background-color: #fcb07e">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 offset-10 mb-2 align-right">
                <a href="/productos" class="waves-effect waves-light text-white btn" style="background-color: #71a9f7">{{ __('Regresar') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
