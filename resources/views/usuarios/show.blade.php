@extends('layouts.app')
{{-- extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    {{-- recuperamos cada campo que tenemos en nuestra base de datos del producto que nosotros le digamos --}}
    <h1 class="display-4">{{$user->name}}</h1>
    <p class="lead">{{ $user->email}}</p>
    <p class="lead">{{ $user->fecha}}</p>
    
      <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px">
   
  </div>
</div>
@endsection