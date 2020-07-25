@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$producto->name}}</h1>
    <p class="lead">{{ $producto->descripcion}}</p>
    <p class="lead">{{ $producto->inicio}}</p>
    <p class="lead">{{ $producto->fin}}</p>
    <p class="lead">{{ $producto->precio}}</p>
    
      {{-- <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px"> --}}
   
  </div>
</div>
@endsection