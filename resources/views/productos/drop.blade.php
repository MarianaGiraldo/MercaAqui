@extends('layouts.app')
@section('content')
@role('Admin')
<div>
    <div class="parallax-index">
        <br><br><br>
        <div class="card-panel orange lighten-3 bg-light w-50 m-auto  rounded h-auto">
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
@include('components.authAlert')
@endrole
@endsection
