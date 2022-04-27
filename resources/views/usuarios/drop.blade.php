@extends('layouts.app')
@section('content')
@role('Admin')
<div>
    <div class="parallax-index">
        <br><br><br><br><br><br>
        <div class="card-panel orange lighten-3 bg-light w-50 m-auto  rounded h-auto">
            <h2 class="header center-align">Eliminar usuario: {{$dropUser->nombre}} {{$dropUser->apellido}} </h2>
            <div class="row center container m-auto">
                <div class="card orange accent-2">
                    <form action="{{ route('usuarios.destroy', $dropUser->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-content white-text">
                            <span for="delete" class="card-title">¿Estas seguro de que quieres eliminar este usuario? </span>
                        </div>
                        <div class="card-action">
                            <div class="form-group row mx-3 my-0">
                                <div class="col-sm-12">
                                    <button type="submit" class="waves-effect waves-light btn text-white float-right mx-2" style="background-color: #71A9F7">
                                        {{ __('Guardar') }}
                                    </button>
                                    <a href="/productos" class="waves-effect waves-light btn text-white float-right mx-2"
                                        style="background-color: #FF9B42">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@else
@include('components.authAlert')
@endsection
@endrole
