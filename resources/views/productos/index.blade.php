@extends('layouts.app')
@section('content')
    @role('Admin')
        <div>
            <div class="parallax-index">
                <br><br><br>
                <div class="bg-light w-75 m-auto p-1 rounded h-75">
                    <div class="col overflow-auto h-100">
                        <h2 class="center-align sticky-top bg-light">Productos</h2>

                        <div class="row center container m-auto">
                            @foreach ($productos as $producto)
                                <div class="col-sm-3 mt-4 d-block-inline" >
                                    <div class="card profile-card-5" style="height:400px ">
                                        <div class="card-img-block" style="max-height: 222px">
                                            <img class="card-img-top" src="imagenes/productos/{{ $producto->imagen }}"
                                                alt="{{ $producto->nombre }}">
                                        </div>
                                        <div class="card-body pt-0" style="height:180px">
                                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                                            <p class="card-text">Precio: $ {{ $producto->precio }} <br>
                                                Cantidad disponible: {{ $producto->cantidad_disponible }}</p>
                                            <a href="/productos/{{ $producto->id }}"
                                                class="secondary-content text-white btn btn-small"
                                                style="background-color: #71A9F7">Ver</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="container w-100 pr-5">
                    <a href="usuarios/create" class="float">
                        <i class="fa fa-plus my-float"></i>
                    </a>
                </div>
            </div>
        </div>
    @else
        @include('components.authAlert')
    @endrole
@endsection
