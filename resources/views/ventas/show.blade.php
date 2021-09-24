@extends('layouts.app')
@section('content')
<br><br><br>
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br>
        <br>
        <br>
        <div class="card-panel orange lighten-3 w-50 m-auto p-1 rounded h-50">
            <div class="col overflow-auto h-100">
                <div class="col s12">
                    <h2 class="header center-align"> {{$venta->nombre}} </h2>
                    <div class="row card w-100 mx-auto">
                        <div class="card-stacked">
                            <div class="card-content">
                                <p class="m-2">ID Venta: {{$venta->id}} </p>
                                <p class="m-2">Fecha de la Venta: {{$venta->fecha_venta}} </p>
                                <p class="m-2">ID Vendedor: {{$venta->vendedor_id}} </p>
                                <p class="m-2">Nombre del Vendedor: {{$vendedor->nombre}} {{$vendedor->apellido}} </p>
                                <p class="m-2">Nombre del Cliente: {{$venta->nombre_cliente}} </p>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Descripcion</th>
                                            <th>Valor unitario</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    @foreach($productos as $producto)
                                    <tr>                        
                                        <td>{{$producto['cantidad']}}</td>
                                        <td>{{$producto['nombre']}}</td>
                                        <td>{{$producto['precio']}}</td>
                                        <td>{{$producto['precio'] * $producto['cantidad']}}</td>
                                    </tr>                       
                                    @endforeach   
                                                        
                                </table>
                                <div class="right mt-4">
                                    <h3 class="d-inline m-3">Total</h3>
                                    <p class="d-inline m-5">{{$total}}</p> 
                                </div>
                            </div>
                            <div class="card-action">
                                <a href="/ventas/{{$venta->id}}/edit">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offset-md-5">
                    <a href="/ventas" class="waves-effect waves-light light-blue lighten-2 btn">{{ __('Regresar') }}</a>
                </div>
            </div>         
        </div>
    </div>
</div>
@endsection