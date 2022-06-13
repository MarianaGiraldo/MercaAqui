@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div class="parallax-index" style="height: 100%;">
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="container pt-4">
                @if ($errors->any())
                    <div class="w-75 mx-auto">
                        <div class="alert alert-danger  my-1" role="alert"> Error! Producto no guardado </div>
                        <ul class="list-group-flush">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0 mb-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:30%; right:50%; left:25%; transform: translateY(-25%);">
                                    <i class="fa-solid fa-file-circle-plus text-center" alt="Venta-Image" style="font-size:7rem;"></i>
                                </div>
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:45%; left:22%;">
                                    <h4 class="f-w-600 text-center">Editar Venta</h4>
                                </div>
                            </div>
                            <div class="col-sm-8 pt-4">
                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Editar Venta</h4>
                            <form action="/ventas/{{$venta->id}}" method="POST" enctype="multipart/form-data" class="w-100">
                            @csrf
                            @method('put')
                                <div class="row ">
                                    <div class="input-field col s6">
                                        <input value="{{$venta->fecha_venta}}" id="fecha_venta" name="fecha_venta" type="date"
                                            class="validate">
                                        <label for="fecha_venta">Fecha Venta</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input value="{{$venta->nombre_cliente}}" id="nombre_cliente" name="nombre_cliente"
                                            type="text" class="validate">
                                        <label for="nombre_cliente">Nombre Cliente</label>
                                    </div>
                                </div>
                                <div class="formgroup w-75 m-auto">
                                    <label for="productos">Seleccione los productos vendidos y la cantidad</label>
                                    @foreach ($productos as $producto)
                                    <div class="row">
                                        @if(($producto_ventas
                                            ->where(['venta_id' => $venta->id, 'producto_id' => $producto->id ])
                                            )->exists())
                                            <p class="col">
                                                <label>
                                                    <input type="checkbox" checked="checked" class="filled-in"
                                                        value="{{$producto->id}}" name="productos[]" />
                                                    <span>{{$producto->nombre}}</span>
                                                </label>
                                            </p>
                                            <div class="col">
                                                <input type="number" name="{{$producto->id}}" id="{{$producto->id}}"
                                                    value="{{$producto_ventas
                                                        ->where('venta_id', $venta->id)
                                                        ->where('producto_id', $producto->id)
                                                        ->value('cantidad')}}"
                                                    max="{{$producto->cantidad_disponible}}" min="1">
                                                <p class="text-muted mb-0 py-0">Máximo: {{$producto->cantidad_disponible}}</p>
                                            </div>
                                            <div class="col">
                                                <p class="number text-muted mb-0 py-0">Precio: ${{ $producto->precio }}</p>
                                            </div>

                                            @elseif(($producto_ventas
                                            ->where(['venta_id' => $venta->id, 'producto_id' => $producto->id ])
                                            )->doesntExist())

                                            <p class="col">
                                                <label>
                                                    <input type="checkbox" class="filled-in" value="{{$producto->id}}"
                                                        name="productos[]" />
                                                    <span>{{$producto->nombre}}</span>
                                                </label>
                                            </p>
                                            <div class="col">
                                                <input type="number" name="{{$producto->id}}" id="{{$producto->id}}" value="1"
                                                    max="{{$producto->cantidad_disponible}}" min="1">
                                                <p class="text-muted mb-0 py-0">Máximo: {{$producto->cantidad_disponible}}</p>
                                            </div>
                                            <div class="col">
                                                <p class="number text-muted mb-0 py-0">Precio: ${{ $producto->precio }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                <div class="py-4">
                                    <a href="/ventas"
                                        class="waves-effect waves-light btn text-white" style="background-color: #FF9B42">Regresar</a>
                                    <button type="submit" class="waves-effect waves-light btn float-right text-white" style="background-color: #71A9F7">
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </form>
                            </div>
                        </div>
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
