@extends('layouts.app')
@section('content')
    @role('Admin')
        <div>
            <div class="parallax-index">
                <br><br><br>
                <div class="card-panel w-50 m-auto  rounded h-auto py-4" style="background-color: #71A9F7">
                    <h1 class="header center-align white-text display-4">Borrar usuario {{ $dropUser->nombre }} </h1>
                    <div class="row container m-auto w-100">
                        <form action="{{ route('usuarios.destroy', $dropUser->id) }}" method="POST" class="w-100 text-center">
                            @csrf
                            @method('DELETE')
                            <div class="card-content  white-text py-3">
                                <span for="delete" style="font-size:1.4rem">¿Estas seguro que deseas eliminar este
                                    vendedor?</span>
                            </div>
                            <div class="card-action">
                                <div class="form-group row mx-3 my-0 p-2">
                                    <div class="col-sm-12">
                                        <a href="/usuarios/{{ $dropUser->id }}"
                                            class="waves-effect waves-light btn text-white mx-2"
                                            style="background-color: #FF9B42">Regresar</a>
                                        <button type="submit" class="waves-effect waves-light btn btn-danger text-white mx-2">
                                            {{ __('Eliminar') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('components.authAlert')
    @endsection
@endrole
