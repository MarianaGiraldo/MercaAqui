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
                            <button type="submit" class="waves-effect waves-light btn red lighten-2">Eliminar</button>
                            <a href="/usuarios" class="waves-effect waves-light btn blue lighten-3" role="button">Regresar</a>
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
