@extends('layouts.app')
@section('content')

<div class="section">
    <h1>Home</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ab architecto doloribus nihil, sunt debitis beatae voluptas similique sint earum blanditiis ullam ad? Nobis incidunt assumenda cum, ab molestias nam?</p>
</div>
@can('menuHome') 
<div>
    <a href="">Ir a panel administrador</a>
</div>
@endcan

@endsection
