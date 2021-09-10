@extends('layouts.app')
@section('content')
@role('Admin')
<div class="row m-4 ">
    <div class="col">
        <h1>Borrar producto {{$dropProduct->nombre}} </h1>
    </div>
</div>
<div class="row center container w-50 m-auto">
    <div class="col s6 m6">
        <div class="card red lighten-2">
            <form action="{{ route('productos.destroy', $dropProduct->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="card-content white-text">
                    <span for="delete" class="card-title">¿Estas seguro que deseas eliminar este producto?</span>
                </div>
                <div class="card-action">
                    <a typ="submit" class="waves-effect waves-light btn red lighten-2">Eliminar</a>
                    <a href="/productos/{{$dropProduct->id}} "
                        class="waves-effect waves-light btn blue lighten-3">Regresar</a>
                </div>
            </form>
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
