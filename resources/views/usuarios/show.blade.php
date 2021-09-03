@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col">
            <h1>Información del usuario {{$user->id}} </h1>
        </div>
    <a href="/usuarios" class="waves-effect waves-light btn">Regresar</a>
</div>        
    
@endsection