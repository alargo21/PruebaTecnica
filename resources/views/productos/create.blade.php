@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
          <h2>Agregar Producto</h2>
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
          <button type="submit" class="btn btn-primary">Registrar</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
      </div>
      </form>
      
</div>
@endsection