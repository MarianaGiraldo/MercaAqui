@extends('layouts.app')
@section('content')
@role('Admin|Vendedor')
<div class="parallax-index">
    <div class="padding">
        <div class="row  d-flex justify-content-center">
            <div class="col-xl-7 col-md-10">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0 mb-0">
                        <div class="col-sm-4 user-profile pb-0">
                            <div class="card-block text-center text-white">
                                <img class="w-100" src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" />
                            </div>
                        </div>
                        <div class="col-sm-8 bg-c-lite-green">
                            <div class="card-block">
                                <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información del producto No.
                                    {{ $producto->id }}
                                </h5>
                                <div class="row">
                                    <div class="col">
                                        <p class="m-b-10 f-w-600">Nombre del Producto</p>
                                        <h6 class="f-w-400">{{ $producto->nombre }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Tipo</p>
                                        <h6 class="f-w-400">{{ $producto->tipo }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Precio</p>
                                        <h6 class="f-w-400">{{ $producto->precio }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Cantidad Disponible</p>
                                        <h6 class="f-w-400">{{ $producto->cantidad_disponible }}</h6>
                                    </div>
                                </div>
                                <br><br>
                                <div class="float-bottom w-100 pr-5">
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Acción</h6>
                                    <div class="row py-2">
                                        @role('Admin')
                                        <div class="col-sm-4 px-1 pb-2">
                                            <a href="/productos/{{ $producto->id }}/edit" class="d-block waves-effect waves-light btn text-white" style="background-color: #71A9F7">Editar</a>
                                        </div>
                                        <div class="col-sm-4 px-1 pb-2">
                                            <a href="/productos/{{ $producto->id }}/drop" class="d-block waves-effect waves-light btn btn-danger">Borrar</a>
                                        </div>
                                        @endrole
                                        <div class="col-sm-4 px-1 pb-2">
                                            <a href="/productos" class="d-block waves-effect waves-light btn text-white" style="background-color: #ff9b42">Regresar</a>
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
@endrole
@endsection