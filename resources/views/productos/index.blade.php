@extends('layouts.app')
@section('content')
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br>
        <br>
        <br>
        <div class="bg-light w-25 m-auto p-3 rounded">
            <p class="text-center" style="font-family: MarkingPen; color:#f7941d; font-size: 6vh">Merca Aqui</p>
            <p class="text-center" style="font-family: MarkingPen; color:#f7941d; font-size: 4vh">El lugar en donde encontrarás lo que necesites</p>

        </div>
    </div>
</div>
@foreach($productos as $producto)
<div class="row center container w-50 m-auto">
    <div class="col align-content-center">
      <ul class="collection">
        <li class="collection-item avatar">
        <img src="imagenes/productos/{{$producto->img}}" alt="{{$producto->nombre}}" class="circle">
      <span class="title">{{$producto->nombre}} </span>
      <p>Precio: $ {{$producto->precio}} <br>
         Cantidad disponible: {{$producto->cantidad_disponible}}
      </p>
      <a href="/productos/{{$producto->id}}" class="secondary-content waves-effect waves-light cyan accent-2 btn">Ver</a>
    </li> 
    </div>
</div>
@endforeach
<div class="col-md-6 offset-md-5">
  <a href="/productos/create" class="waves-effect waves-light light-blue lighten-2 btn">Crear producto</a>
</div>

@endsection
