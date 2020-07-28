@extends('layouts.app')

{{-- //extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
@section('content')
<div class="container">   
    <div class="row">
        <div class="col-md-6 mx-auto">
  <h2>Lista de Categorias
      @include('categorias.modal')
  </h2>

  {{-- //Creamos una tabla para ver  los campos que tiene las categorias --}}
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categorias as $categoria)
      <tr>
        <th scope="row">{{$categoria->id}}</th>
        <td>{{$categoria->name}}</td> 

        <td>

          {{-- //indicamos el metodo dentro del controlar para poder eliminar un registro  --}}
            <form action="{{route('categorias.destroy', $categoria->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>
@endsection