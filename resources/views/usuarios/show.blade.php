@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$user->name}}</h1>
    <p class="lead">{{ $user->email}}</p>
    
      <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px">
   
  </div>
</div>
@endsection