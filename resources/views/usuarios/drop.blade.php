@extends('layouts.appLayout')
@section('content')
<div class="row">
        <div class="col">
            <h1>Borrar Usuario {{$dropUser->nombre}} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('usuarios.destroy', $dropUser->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="formgroup row mb-3">
                    <label for="delete" class="col col-form-label fs-3 ">Confirme si quiere borrar el usuario. </label>
                </div>
                <button type="submit" class="btn btn-danger">Borrar</button>
                <a href="/usuarios" class="btn btn-primary m-3" role="button">Cancelar</a>
            </form>
            <br><br>
        </div>
    </div>
@endsection