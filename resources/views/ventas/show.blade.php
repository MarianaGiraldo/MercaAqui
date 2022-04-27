@extends('layouts.app')
@section('content')
    @hasanyrole('Admin|Vendedor')
        <div class="parallax-index">
            <br><br><br>
            <!-- ---------New table---------- -->
            <div class="bg-light m-auto p-4 rounded col-md-6 col-sm-8">
                <div class="page-content container">
                    <div class="container px-0">
                        <div class="row mt-4">
                            <div class="col-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center text-150">
                                            <img src="/logo/logo.png" width="15%"></img>
                                            <p id="logo-container" class=" navbar-brand col"
                                                style="font-family: Akshar; color:#ff9b42; font-size: 60px">Merca Aqui</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-header text-blue-d2">
                                    <h1 class="page-title text-secondary-d1">
                                        Factura
                                        <small class="page-info">
                                            <i class="fa fa-angle-double-right text-80"></i>
                                            ID: {{ $venta->id }}
                                        </small>
                                    </h1>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <span class="text-sm text-grey-m2 align-middle">Para:</span>
                                            <span
                                                class="text-600 text-110 text-blue align-middle">{{ $venta->nombre_cliente }}</span>
                                        </div>
                                        <div class="text-grey-m2">
                                            <div>
                                                <span class="text-sm text-grey-m2 align-middle">Vendedor:</span>
                                                <span class="text-600 text-110 text-blue align-middle">{{ $vendedor->nombre }}
                                                    {{ $vendedor->apellido }}</span>
                                            </div>
                                            <div>
                                                <span class="text-sm text-grey-m2 align-middle">ID del Vendedor:</span>
                                                <span class="text-600 text-110 text-blue align-middle">{{ $vendedor->id }}
                                                </span>
                                            </div>
                                            <span class="text-sm text-grey-m2 align-middle">Telefono del Vendedor:</span>
                                            <span class="text-600 text-110 align-middle"><i
                                                    class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                                    class="text-600">{{ $vendedor->celular }}</b> </span>
                                        </div>
                                    </div>
                                    <div class="text-95 col-sm-6 align-self-start d-sm-flex ">
                                        <hr class="d-sm-none" />
                                        <div class="text-grey-m2">
                                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                Detalles Factura
                                            </div>

                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                <span class="text-600 text-90">ID: </span> {{ $venta->id }} </div>

                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                <span class="text-600 text-90">Fecha de Factura:</span>
                                                {{ $venta->fecha_venta }} </div>

                                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                <span class="text-600 text-90">Estado:</span> <span
                                                    class="badge badge-success badge-pill px-25">Pagada</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                                        <div class="d-none d-sm-block col-1">Cantidad</div>
                                        <div class="col-9 col-sm-6">Descripcion</div>
                                        <div class="d-none d-sm-block col-4 col-sm-2">Valor Unitario</div>
                                        <div class="d-none d-sm-block col-sm-1">Total</div>
                                    </div>
                                    @foreach ($productos as $producto)
                                        <div class="text-95 text-secondary-d3">
                                            <div class="row mb-2 mb-sm-0 py-25">
                                                <div class="number d-none d-sm-block col-1">{{ $producto['cantidad'] }}</div>
                                                <div class="col-9 col-sm-6">{{ $producto['nombre'] }}</div>
                                                <div class="number d-none d-sm-block col-2">${{ $producto['precio'] }}</div>
                                                <div class="number d-none d-sm-block col-1 text-95">
                                                    ${{ $producto['precio'] * $producto['cantidad'] }}</div>
                                            </div>
                                    @endforeach
                                    <hr />
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                        </div>
                                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                <div class="col-5 text-right">
                                                    Total
                                                </div>
                                                <div class="col-7">
                                                    <span
                                                        class="number text-150 text-success-d3 opacity-2">${{ $total }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-secondary-d1 text-105">Gracias por tu compra</span>
                                        <div class="form-group row mx-3 my-0">
                                            <div class="col-sm-12">
                                                <a href="/ventas"
                                                    class="waves-effect waves-light btn text-white float-right mx-2"
                                                    style="background-color: #FF9B42">Regresar</a>
                                            </div>
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
