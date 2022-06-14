@extends('layouts.app')
@section('content')
        <div>
            <div class="parallax-index">
                <br><br><br>
                <div class="bg-light w-75 m-auto px-1 pt-0 rounded h-75">
                    <div class="col overflow-auto h-100">
                        <h2 class="table-title center-align sticky-top bg-light mt-3">Productos</h2>

                    <div class="row center container m-auto">
                        @foreach ($productos as $producto)
                            <div class="col-sm-3 mt-4 d-block-inline">
                                <div class="card profile-card-5" style="max-height:420px ">
                                    <div class="card-img-block d-block" style="height: 260px">
                                        <img class="card-img-top" style="max-height: 230px; max-width: 100%"
                                            src="{{ $producto->imagen }}"
                                            alt="{{ $producto->nombre }}">
                                    </div>
                                    <div class="card-body pt-0" style="height:160px">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text">Precio: $ {{ $producto->precio }} <br>
                                            Cantidad disponible: {{ $producto->cantidad_disponible }}</p>

                                    </div>
                                    <a href="/productos/{{ $producto->id }}"
                                        class="text-white btn btn-small w-50 mx-auto mb-3"
                                        style="background-color: #FF9B42">Ver</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container w-100 pr-3">
                <a href="productos/create" class="float">
                    <i class="fa fa-plus my-float"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
