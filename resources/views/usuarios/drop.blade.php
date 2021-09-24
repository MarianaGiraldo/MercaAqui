@extends('layouts.app')
@section('content')
@role('Admin')
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br><br><br><br><br><br>
        <div class="card-panel bg-light w-50 m-auto  rounded h-auto">
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
@endsection
@endrole
