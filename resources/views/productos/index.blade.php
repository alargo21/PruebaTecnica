@extends('layouts.app')

@section('content')

<div class="container">   
    <h2>Lista de productos <a href="productos/create"><button type="button" class="btn btn-success float-right">Agregar Producto</button></a></h2>
  
    <h6>
      @if($search)
        <div class="alert alert-primary" role="alert">
          Los resultados para tu busqueda '{{ $search }}' son:
        </div>
      </h6>
    @endif

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)    
          <tr>
            <th scope="row">{{$producto->id}}</th>
            <td>{{$producto->name}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->inicio}}</td>
            <td>{{$producto->fin}}</td>
            <td>{{$producto->precio}}</td>
            <td>
              <img src="{{ asset('imagenes/'.$producto->imagen) }}" alt="{{ $producto->imagen }}" height="50px" width="50px">
            </td>

            <td>

        <form action="{{route('productos.destroy', $producto->id) }}" method="POST">
              <a href="{{route('productos.show', $producto->id) }}"><button type="button" class="btn btn-secondary">Ver</button></a>
              <a href="{{route('productos.edit', $producto->id) }}"><button type="button" class="btn btn-primary">Editar</button></a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
       </form>
              </td>

          </tr>

          @endforeach
        </tbody>
      </table>

      <div class="row">
        <div class="mx-auto">
          {{ $productos->links()}}
        </div>
      </div>
  </div>
@endsection