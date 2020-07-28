@extends('layouts.app')
{{-- extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">

    {{-- recuperamos cada campo que tenemos en nuestra base de datos del producto que nosotros le digamos --}}
    <h1 class="display-4">{{$producto->name}}</h1>
    <p class="lead">{{ $producto->descripcion}}</p>
    <p class="lead">{{ $producto->inicio}}</p>
    <p class="lead">{{ $producto->fin}}</p>
    <p class="lead">{{ $producto->precio}}</p>
    
      <img src="{{ asset('imagenes/'.$producto->imagen) }}" alt="{{ $producto->imagen }}" height="50px" width="50px">
   
  </div>
</div>
@endsection