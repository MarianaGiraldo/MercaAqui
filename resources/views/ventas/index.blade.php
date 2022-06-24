@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div>
    <div class="parallax-index" style="height: 100vh">
        <br><br><br>
        <div class="bg-light col-lg-8 col-md-10 col-sm-10 m-auto pb-3 pr-0 pl-3 rounded h-75">
            <div class="col h-100" style="overflow-x: hidden;">
                <h2 class="table-title center-align sticky-top bg-light mt-2">Ventas</h2>
                @if ($errors->any())
                <div class="w-75 mx-auto">
                    <ul class="list-group-flush">
                        @foreach($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
                            <td><a href="ventas/{{ $venta->id }}" class="waves-effect waves-light btn btn-small text-white" style="background-color: #FF9B42">View venta</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-6 offset-md-5 mt-3">
                    <a href="/ventas/create" class="waves-effect waves-light btn text-white" style="background-color: #71A9F7">Crear venta</a>
                </div>
            </div>

        </div>
        <div class="container accordion mt-2">
            <a href="usuarios/create" class="float">
                <i class="fa fa-plus my-float"></i>
            </a>
        </div>
        <br><br><br>
    </div>
</div>
@else
@include('components.authAlert')
@endhasanyrole
@endsection