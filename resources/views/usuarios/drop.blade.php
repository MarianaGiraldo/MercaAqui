@extends('layouts.app')
@section('content')
@role('Admin')
<br><br><br>
<div class="parallax-container mt-0">
    <div class="parallax-index">
        <br><br><br>
        <div class="w-50 m-auto">
            <div class="card">
                <div class="card-header">Eliminar usuario: {{$dropUser->nombre}} {{$dropUser->apellido}} </div>

                        <div class="card-body">
                            <form action="/usuarios/{{$dropUser->id}}" method="POST">
                                <form action="{{ route('usuarios.destroy', $dropUser->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="formgroup row mb-3">
                                        <p for="delete" class="col col-form-label">Confirme si quiere borrar el usuario. </p>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                    <a href="/usuarios" class="btn btn-primary m-3" role="button">Cancelar</a>
                                </form>
                            </form>
                        </div>
                    </div>
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
