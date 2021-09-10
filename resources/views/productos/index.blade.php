@extends('layouts.app')
@section('content')
@role('Admin')
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br>
        <br>
        <br>
        <div class="bg-light w-50 m-auto p-1 rounded h-50">
            <div class="col overflow-auto h-100">
                <h2 class="center-align sticky-top bg-light">Productos</h2>
            @foreach($productos as $producto)
            <div class="row center container m-auto">
                <div class="col align-content-center">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="imagenes/productos/{{$producto->imagen}}" alt="{{$producto->nombre}}"
                                class="circle">
                            <span class="title">{{$producto->nombre}} </span>
                            <p>Precio: $ {{$producto->precio}} <br>
                                Cantidad disponible: {{$producto->cantidad_disponible}}
                            </p>
                            <a href="/productos/{{$producto->id}}"
                                class="secondary-content waves-effect waves-light light-blue lighten-2 btn">Ver</a>
                        </li>
                </div>
            </div>
            @endforeach
            </div>

        </div>
        <div class="container w-75 pr-5">
            <a class="btn-floating btn-large waves-effect waves-light light-blue lighten-2 right pt-2" style="width: 6vw; height: 6vw;" href="productos/create"><i class="material-icons large" style="font-size: 6vw">add</i></a>
        </div>
    </div>
</div>

@else
<br><br>
<div class="row center container w-50 m-auto">
<div class="col s6 m6">
      <div class="card red lighten-2">
        <div class="card-content white-text">
          <span class="card-title">No estas autorizado para esta vista.</span>
        </div>
        <div class="card-action">
          <a href="/" class="waves-effect waves-light btn blue lighten-3">Regresar</a>
        </div>
      </div>
    </div>
</div>
@endrole
@endsection
