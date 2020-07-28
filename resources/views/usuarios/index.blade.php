@extends('layouts.app')
{{-- extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
@section('content')
<div class="container">   
  <h2>Lista de Usuarios <a href="usuarios/create"><button type="button" class="btn btn-success float-right">Agregar Usuario</button></a></h2>

  {{-- buscar un producto que le pasemos --}}
  <h6>
    @if($search)
    <div class="alert alert-primary" role="alert">
      Los resultados para tu busqueda '{{ $search }}' son:
    </div>
    </h6>
    @endif

     {{-- creamos una tabla con los campos y dentro de cada campo el la variable de cada campo para que nos muestre la informacion  --}}

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Nacimiento</th>
        <th scope="col">Imagen</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->fecha}}</td>
        <td>
          <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px">
        </td>
        <td>
  
        <form action="{{route('usuarios.destroy', $user->id) }}" method="POST">
        <a href="{{route('usuarios.show', $user->id) }}"> <button type="button" class="btn btn-secondary">Ver</button></a>
        <a href="{{route('usuarios.edit', $user->id) }}"> <button type="button" class="btn btn-primary">Editar</button></a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
       </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{-- con esto hacemos una paginacion apartir de 5 datos --}}
  <div class="row">
    <div class="mx-auto">
    {{ $users->links()}}
    </div>
    </div>
</div>
@endsection