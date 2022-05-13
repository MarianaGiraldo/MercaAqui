@extends('layouts.app')
@section('content')
    @role('Admin')
        <div class="parallax-index">
            <div class="" id="">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <div class="col-xl-7 col-md-10">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0 mb-0">
                                    <div class="col-sm-4 user-profile pb-0">
                                        <div class="card-block text-center text-white m-auto position-absolute" style="top:50%; transform: translateY(-50%);">
                                            <img class="w-100"
                                                src="{{ asset('imagenes/productos/' . $producto->imagen) }}"
                                                alt="{{ $producto->nombre }}" />
                                        </div>
                                    </div>
                                    <div class="col-sm-8 bg-c-lite-green">
                                        <div class="card-block">
                                            <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Editar producto
                                                {{ $producto->nombre }}</h5>
                                            <form action="/productos/{{ $producto->id }}" method="POST"
                                                enctype="multipart/form-data" class="w-100">
                                                @csrf
                                                @method('put')
                                                <div class="row ">
                                                    <div class="input-field col s6">
                                                        <input placeholder="Manzana" id="nombre" name="nombre" type="text"
                                                            class="validate" value="{{ $producto->nombre }} ">
                                                        <label for="nombre">Nombre</label>
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input placeholder="5.000" id="precio" name="precio" type="text"
                                                            class="validate" value="{{ $producto->precio }} ">
                                                        <label for="precio">Precio</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <input placeholder="500" id="cantidad_disponible"
                                                            name="cantidad_disponible" type="number" class="validate"
                                                            value="{{ $producto->cantidad_disponible }}">
                                                        <label for="cantidad_disponible">Cantidad disponible</label>
                                                    </div>
                                                </div>
                                                <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Seleccione el
                                                    tipo de
                                                    producto</label>
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <select id="tipo"
                                                            class="browser-default bg-c-lite-green select-form validate"
                                                            name="tipo" required>
                                                            <option value="" disabled selected>Tipo de producto</option>
                                                            <option value="Aseo">Aseo</option>
                                                            <option value="Alimentos frescos">Alimentos frescos</option>
                                                            <option value="Alimentos congelados">Alimentos congelados
                                                            </option>
                                                            <option value="Bebidas">Bebidas</option>
                                                            <option value="Alimentos Empacados">Alimentos Empacados</option>
                                                            <option value="Basicos del hogar">Basicos del hogar</option>
                                                            <option value="Cuidado Personal">Cuidado Personal</option>
                                                        </select>
                                                        <script>
                                                            $('option[value="{{ $producto->tipo }}"]').attr('selected', 'true')
                                                        </script>
                                                    </div>
                                                </div>
                                                <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Imagen del
                                                    Producto</label>
                                                <div class="row">
                                                    <div id="inputfile" class="inputfile input-field col s12 bg-c-lite-green">
                                                        <div class="file d-block w-100">
                                                            <input type="file" class="file-input bg-gradient validate" id="img"
                                                                lang="es" name="img" value="{{ $producto->imagen }}">
                                                            <label class="file-label label" for="img">Seleccionar
                                                                Imagen</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-4">
                                                    <a href="/productos/{{ $producto->id }}"
                                                        class="waves-effect waves-light btn text-white"
                                                        style="background-color: #FF9B42">Regresar</a>
                                                    <button type="submit"
                                                        class="waves-effect waves-light btn float-right text-white"
                                                        style="background-color: #71A9F7">
                                                        {{ __('Guardar') }}
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
        </div>
    @else
        @include('components.authAlert')
    @endrole
@endsection
