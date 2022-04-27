@extends('layouts.app')
@section('content')
    @role('Admin')
        <div class="parallax-index">
            <div class="container pt-4">
                @if ($errors->any())
                    <div class="w-75 mx-auto">
                        <div class="alert alert-danger  my-1" role="alert"> Error! Producto no guardado </div>
                        <ul class="list-group-flush">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item list-group-item-danger">{{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="center-align">Editar producto {{ $producto->nombre }}</h2>
                            </div>
                            <div class="card-body">
                                <form action="/productos/{{ $producto->id }}" method="POST" enctype="multipart/form-data"
                                    class="w-100">
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
                                            <input placeholder="500" id="cantidad_disponible" name="cantidad_disponible"
                                                type="number" class="validate"
                                                value="{{ $producto->cantidad_disponible }}">
                                            <label for="cantidad_disponible">Cantidad disponible</label>
                                        </div>
                                    </div>
                                    <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Seleccione el tipo de
                                        producto</label>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select id="tipo" class="browser-default" name="tipo" required>
                                                <option value="" disabled selected>Tipo de producto</option>
                                                <option value="Aseo">Aseo</option>
                                                <option value="Alimentos frescos">Alimentos frescos</option>
                                                <option value="Alimentos congelados">Alimentos congelados</option>
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
                                    <label for="img" class="label input-field  pb-0 row mb-0 ml-2">Imagen del Producto</label>
                                    <div class="row">
                                        <div id="inputfile" class="input-field col s12">
                                            @if (isset($producto->imagen))
                                                <img class="w-50 d-block"
                                                    src="{{ asset('imagenes/productos/' . $producto->imagen) }}"></img>
                                            @endif
                                            <div class="custom-file d-block w-100">
                                                <input type="file" class="custom-file-input" id="img" lang="es"
                                                    value="{{ $producto->imagen }}">
                                                <label class="custom-file-label" for="img">Seleccionar Imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                            $('#img').on('change',function(){
                                            //get the file name
                                            var fileName = $(this).val().replace('C:\\fakepath\\', " ");
                                            //replace the "Choose a file" label
                                            $(this).next('.custom-file-label').html(fileName);
                                        })
                                    </script>
                                    <button type="submit" class="waves-effect waves-light light-blue lighten-2 btn">
                                        {{ __('Guardar') }}
                                    </button>
                                    <a href="/productos/{{ $producto->id }}"
                                        class="waves-effect waves-light btn btn-danger float-right">Regresar</a>
                                </form>
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
