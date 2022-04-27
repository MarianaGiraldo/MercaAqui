@extends('layouts.app')
@section('content')
@hasanyrole('Admin|Vendedor')
<div>
    <div class="parallax-index">
      <br><br><br>
        <div class="bg-light w-50 m-auto p-1 rounded h-50">
            <div class="col overflow-auto h-100">
                <h2 class="center-align sticky-top bg-light">Ventas</h2>
                <table class="highlight">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Fecha de la venta</th>
                          <th>ID del vendedor</th>
                          <th>Nombre del Cliente</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach($ventas as $venta)
                        <tr class="table-light">
                            <td class="table-warning" scope="row" > {{$venta->id}}</td>
                            <td >{{$venta->fecha_venta}} </td>
                            <td >{{$venta->vendedor_id}} </td>
                            <td >{{$venta->nombre_cliente}} </td>
                            <td><a href="ventas/{{$venta->id}}" class="btn btn-success">View venta</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
            <div class="col-md-6 offset-md-5">
                <a href="/ventas/create" class="waves-effect waves-light light-blue lighten-2 btn">Crear venta</a>
            </div>
            </div>

        </div>
        <div class="container w-75 pr-5">
            <a class="btn-floating btn-large waves-effect waves-light light-blue lighten-2 right pt-2" style="width: 6vw; height: 6vw;" href="ventas/create"><i class="material-icons large" style="font-size: 6vw">add</i></a>
        </div>
    </div>
</div>

@else
@include('components.authAlert')
@endhasanyrole
@endsection