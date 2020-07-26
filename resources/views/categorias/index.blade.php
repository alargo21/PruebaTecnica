@extends('layouts.app')

@section('content')
<div class="container">   
    <div class="row">
        <div class="col-md-6 mx-auto">
  <h2>Lista de Categorias
      @include('categorias.modal')
  </h2>

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