@extends('layouts.app')
@section('content')
@role('Admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

@else

@endrole

@endsection
