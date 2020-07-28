@extends('layouts.app')
{{-- //extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
          <h2>Agregar Producto</h2>

          {{-- //Nos mostrara si tenemos algun error --}}
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

    {{-- //creamos un formulario y con un token vamos a almacenar los datos que le pasamos en cada uno de los campos del formulario --}}
    <form action="{{ url('/productos') }}" method="POST" enctype="multipart/form-data">
      @csrf
      
      <div class="row">
        <div class="form-group col-md-6">
          <label>Producto</label>
          <input type="text" name="name" class="form-control" placeholder="Producto">
        </div>
        
        <div class="form-group col-md-6">
          <label>Descripcion</label>
          <input type="text" name="descripcion" class="form-control" placeholder="Descripcion">
        </div>
      </div>
      
      
      <div class="row">
        <div class="form-group col-md-6">
          <label>Fecha Inicio</label>
          <input type="text" class="form-control" name="inicio" placeholder="YYYY-MM-DD">
        </div>
      
        <div class="form-group col-md-6">
          <label>Fecha Fin</label>
          <input type="text" class="form-control" name="fin" placeholder="YYYY-MM-DD">
        </div>
      
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <label>Precio</label>
          <input type="text" class="form-control" name="precio" placeholder="Precio">
        </div>

        <div class="form-group col-md-6">
          <label>Imagen</label>
          <input type="file" name="imagen" class="form-control" >
        </div>
      </div>

      
      <div class="row">
        <div class="form-group col-md-6">
          <label>Categoria</label>
          <select name="categoria" class="form-control">
            <option selected disabled>Elige una categoria </option>
            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
            @endforeach
          </select>

        </div>

      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <button type="submit" class="btn btn-primary">Registrar</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
      </div>
      </form>
      
</div>
@endsection