@extends('layouts.app')
@section('content')
<div class="row m-4 ">
        <div class="col">
            <h1>Borrar producto {{$dropProduct->nombre}} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('books.destroy', $dropBook->id) }}" method="POST" class="w-50 mx-auto confirmDrop p-4 rounded" >
                @csrf
                @method('DELETE')
                <div class="formgroup row mb-3">
                    <label for="delete" class="col col-form-label fs-3 ">Confirme si quiere eliminar el producto. </label>
                </div>
                <button type="submit" class="btn btn-primary">Eliminar</button>
                <a href="/books" class="btn btn-primary m-3" role="button">Cancel</a>

            </form>
            <br><br>
        </div>
    </div>
@endsection