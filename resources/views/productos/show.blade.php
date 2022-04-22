@extends('layouts.app')
@section('content')
<div class="parallax-index">
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row  d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0 mb-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <img src="imagenes/productos/{{ $producto->imagen }}" alt="{{ $producto->nombre }}"/>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Información del producto No. {{$producto->id}}</h5>
                                <div class="row">
                                    <div class="col">
                                        <p class="m-b-10 f-w-600">Nombre del Producto</p>
                                        <h6 class="text-muted f-w-400">{{$producto->nombre}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Tipo</p>
                                        <h6 class="text-muted f-w-400">{{$producto->tipo}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Precio</p>
                                            <h6 class="text-muted f-w-400">{{$producto->precio}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Cantidad Disponible</p>
                                            <h6 class="text-muted f-w-400">{{$producto->cantidad_disponible}}</h6>
                                    </div>
                                </div>
                                <br>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Acción</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="/productos/{{$producto->id}}/edit" class="waves-effect waves-light btn-success btn">Editar</a>
                                        <a href="/productos/{{$producto->id}}/drop" class="waves-effect waves-light btn right btn-danger">Borrar</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="/productos" class="waves-effect waves-light btn btn-warning float-right">Regresar</a>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

@endsection