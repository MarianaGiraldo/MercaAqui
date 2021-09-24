@extends('layouts.app')
@section('content')
@role('Admin')
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br><br><br>
        <div class="card-panel bg-light w-50 m-auto  rounded h-auto">
            <h2 class="header center-align">Borrar producto {{$dropProduct->nombre}} </h2>
            <div class="row center container m-auto">
                <div class="card orange accent-2">
                    <form action="{{ route('productos.destroy', $dropProduct->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="card-content white-text">
                            <span for="delete" class="card-title">¿Estas seguro que deseas eliminar este producto?</span>
                        </div>
                        <div class="card-action">
                            <button typ="submit" class="waves-effect waves-light btn orange lighten-3">Eliminar</button>
                            <a href="/productos/{{$dropProduct->id}} "
                                class="waves-effect waves-light btn blue lighten-3">Regresar</a>
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
