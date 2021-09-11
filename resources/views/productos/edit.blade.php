@extends('layouts.app')
@section('content')
@role('Admin')
<div class="container">
    @if($errors->any())
    <div class="w-75 mx-auto">
        <div class="alert alert-danger  my-1" role="alert"> Error! Producto no guardado </div>
        <ul class="list-group-flush">
            @foreach( $errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}} </li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="center-align">Editar producto: {{$producto->nombre}}</h2>
                </div>
                <div class="card-body">
                    <form action="/productos/{{$producto->id}}" method="POST" enctype="multipart/form-data"
                        class="w-100">
                        @csrf
                        @method('put')
                        <div class="row ">
                            <div class="input-field col s6">
                                <input placeholder="Manzana" id="nombre" name="nombre" type="text" class="validate" value="{{$producto->nombre}} ">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="5.000" id="precio" name="precio" type="text" class="validate" value="{{$producto->precio}} ">
                                <label for="precio">Precio</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="500" id="cantidad_disponible" name="cantidad_disponible" type="number" class="validate" value="{{$producto->cantidad_disponible}}">
                                <label for="cantidad_disponible">Cantidad disponible</label>
                            </div>
                        </div>
                        <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Seleccione el tipo de
                            producto</label>
                        <div class="row">
                            <div class="input-field col s12">
                                <select class="browser-default" name="tipo">
                                    <option value="" disabled selected>Tipo de producto</option>
                                    <option value="Aseo">Aseo</option>
                                    <option value="Alimentos frescos">Alimentos frescos</option>
                                    <option value="Alimentos congelados">Alimentos congelados</option>
                                    <option value="Bebidas">Bebidas</option>
                                    <option value="Alimentos Empacados">Alimentos Empacados</option>
                                    <option value="Basicos del hogar">Basicos del hogar</option>
                                    <option value="Cuidado Personal">Cuidado Personal</option>
                                </select>
                            </div>
                        </div>
                        <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Imagen del Producto</label>
                        <div class="row">
                            <div class="input-field col s12">
                                <input class="form-control" type="file" id="img" name="img" value="{{$producto->imagen}}">
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="waves-effect waves-light light-blue lighten-2 btn">
                                {{ __('Guardar') }}
                            </button>
                            <button href="/productos" class="waves-effect waves-light orange lighten-2 btn">
                                {{ __('Regresar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
