@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h2>Editar Producto: {{ $producto->name }}</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
    </div>
</div>
            
<form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

<div class="row">
  <div class="form-group col-md-6">
    <label>Producto</label>
    <input type="text" name="name" class="form-control" value="{{ $producto->name }}"  placeholder="Producto">
  </div>
  
  <div class="form-group col-md-6">
    <label>Descripcion</label>
    <input type="text" name="descripcion" class="form-control" value="{{ $producto->descripcion }}" placeholder="Descripcion">
  </div>
</div>


<div class="row">
  <div class="form-group col-md-6">
    <label>Fecha Inicio</label>
    <input type="text" class="form-control" name="inicio" value="{{ $producto->inicio }}" placeholder="YYYY-MM-DD">
  </div>

  <div class="form-group col-md-6">
    <label>Fecha Fin</label>
    <input type="text" class="form-control" name="fin" value="{{ $producto->fin }}" placeholder="YYYY-MM-DD">
  </div>

</div>

<div class="row">
  <div class="form-group col-md-6">
    <label>Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}" placeholder="Precio">
  </div>

  <div class="form-group col-md-6">
    <label>Imagen</label>
    <input type="file" name="imagen" class="form-control" >
    @if ($producto->imagen != "")
    <img src="{{ asset('imagenes/'.$producto->imagen) }}" alt="{{ $producto->imagen }}" height="50px" width="50px">
    @endif
  </div>
</div>


<div class="row">
  <div class="form-group col-md-6">
    <label>Categoria</label>
    <select name="categoria" class="form-control">
      <option selected disabled>Elige una categoria </option>
      @foreach ($categorias as $categoria)
      @if ($categoria->name == str_replace(array('["', '"]'), '', $producto->tieneCategoria()));
      <option value="{{ $categoria->id }}" selected>{{ $categoria->name }}</option>
      @else
      <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
      @endif
      
      @endforeach
    </select>

  </div>

</div>

<div class="row">
  <div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </div>
</div>
</form>
        
</div>
@endsection