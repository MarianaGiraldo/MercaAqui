@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div class="parallax-index">
    <div class="container pt-4">
        @if($errors->any())
        <div class="w-75 mx-auto">
            <div class="alert alert-danger  my-1" role="alert"> Error! Producto no guardado </div>
            <ul class="list-group-flush">
                @foreach( $errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{$error}} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="center-align">Crear una Venta</h2>
                    </div>
                    <div class="card-body">
                        <form action="/ventas" method="POST" enctype="multipart/form-data" class="w-100">
                            @csrf
                            <div class="row ">
                                <div class="input-field col s6">
                                    <input id="fecha_venta" name="fecha_venta" type="date" class="validate" required>
                                    <label for="fecha_venta">Fecha Venta</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="nombre_cliente" name="nombre_cliente" type="text" class="validate" required>
                                    <label for="nombre_cliente">Nombre Cliente</label>
                                </div>
                            </div>
                            <div class="formgroup w-50 m-auto">
                                <label for="productos">Seleccione los productos vendidos y la cantidad</label>
                                @foreach ($productos as $producto)
                                <div class="row">
                                    <p class="col">
                                        <label>
                                            <input type="checkbox" class="filled-in" value="{{$producto->id}}" name="productos[]" />
                                            <span>{{$producto->nombre}}</span>
                                        </label>
                                    </p>
                                    <div class="col">
                                        <input type="number" name="{{$producto->id}}" id="{{$producto->id}}" value="1" max="{{$producto->cantidad_disponible}}" min="1">
                                        <p class="text-muted mb-0 py-0">Máximo: {{$producto->cantidad_disponible}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                                <button type="submit" class="waves-effect waves-light light-blue lighten-2 btn">
                                    {{ __('Registrar') }}
                                </button>
                                <a href="/ventas" class="waves-effect waves-light btn btn-danger float-right">Regresar</a>
                        </form>
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
