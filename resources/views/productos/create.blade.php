@extends('layouts.app')
@section('content')
@role('Admin')
<div class="parallax-index">
    <div class="page-content page-container" id="page-content">
        <div class="container pt-5">
            @if($errors->any())
            <div class="w-75 mx-auto" >
                <div class="alert alert-danger  my-1" role="alert"> Error! Producto no guardado </div>
                <ul class="list-group-flush" >
                    @foreach( $errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{$error}} </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="padding">
            <div class="row  d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0 mb-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:30%; right:50%; left:25%; transform: translateY(-25%);">
                                    <i class="fa-solid fa-cart-plus text-center" alt="NewProduct-Image" style="font-size:7rem;"></i>   
                                </div>
                                <div class="card-block text-center text-white m-auto position-absolute" style="top:45%; left:22%;">
                                    <h4 class="f-w-600 text-center">Nuevo Producto</h4>
                                </div>
                            </div>
                            <div class="col-sm-8 pt-4">
                            <h4 class="m-b-20 p-b-5 b-b-default f-w-600">Crear Producto</h4>
                            <form action="/productos" method="POST" enctype="multipart/form-data" class="w-100 p-2" >
                            @csrf
                                <div class="row ">
                                    <div class="input-field col s6">
                                        <input placeholder="Manzana" id="nombre" name="nombre" type="text" class="validate">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input placeholder="5.000" id="precio" name="precio" type="text" class="validate">
                                        <label for="precio">Precio</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input placeholder="500" id="cantidad_disponible" name="cantidad_disponible" type="number" class="validate">
                                    <label for="cantidad_disponible">Cantidad disponible</label>
                                    </div>
                                </div>
                                <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Seleccione el tipo de producto</label>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <select class="browser-default" id="tipo" name="tipo">
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
                                <div class="row">
                                    <div class="input-field col s12">
                                    <input placeholder="https://yourimage.com/41548.png" id="cantidad_disponible" name="cantidad_disponible" type="number" class="validate">
                                    <label for="cantidad_disponible">Cantidad disponible</label>
                                    </div>
                                </div>
                                <div class="py-4">
                                    <a href=""
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
@endrole
@endsection
