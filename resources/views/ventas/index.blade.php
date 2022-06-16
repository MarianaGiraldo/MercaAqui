@extends('layouts.app')
@section('content')
    @hasanyrole('Admin|Vendedor')
        <div>
            <div class="parallax-index">
                <br><br><br>
                <div class="bg-light col-md-6 col-sm-8 m-auto pb-3 pr-0 pl-3 rounded h-75">
                    <div class="col h-100" style="overflow-x: hidden;">
                        <h2 class="table-title center-align sticky-top bg-light mt-2">Ventas</h2>
                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th class="id-col-table">ID</th>
                                    <th>Fecha de la venta</th>
                                    <th>ID del vendedor</th>
                                    <th>Nombre del Cliente</th>
                                    <th style="width: 15%">Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($ventas as $venta)
                                    <tr class="table-light">
                                        <td class="table-warning" scope="row"> {{ $venta->id }}</td>
                                        <td>{{ $venta->fecha_venta }} </td>
                                        <td>{{ $venta->vendedor_id }} </td>
                                        <td>{{ $venta->nombre_cliente }} </td>
                                        <td><a href="ventas/{{ $venta->id }}"
                                                class="waves-effect waves-light btn btn-small text-white"
                                                style="background-color: #FF9B42">View venta</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-6 offset-md-5 mt-3">
                            <a href="/ventas/create" class="waves-effect waves-light btn text-white" style="background-color: #71A9F7">Crear venta</a>
                        </div>
                    </div>

                </div>
                <div class="container w-75 pr-5">
                    <a href="ventas/create" class="float">
                        <i class="fa fa-plus my-float"></i>
                    </a>
                </div>
            </div>
        </div>
    @else
        @include('components.authAlert')
    @endhasanyrole
@endsection
