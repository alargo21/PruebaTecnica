@extends('layouts.app')

@section('content')
{{-- //extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
<div class="container">
    <div class="row">
        <div class="col-sm-6">
          <h2>Agregar nuevo usuario</h2>
          @if ($errors->any())
          <div class="alert alert-danger">
            {{-- //Nos mostrara si tenemos algun error --}}
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
<form action="{{ url('/usuarios') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
  <div class="form-group col-md-6">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control" placeholder="Nombre">
  </div>
  
  <div class="form-group col-md-6">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email">
  </div>
</div>


<div class="row">
  <div class="form-group col-md-6">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Contraseña">
  </div>

  <div class="form-group col-md-6">
    <label>Confirmar Password</label>
    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
  </div>

</div>

<div class="row"> 
  <div class="form-group col-md-6">
    <label>Fecha Nacimiento</label>
    <input type="text" class="form-control" name="fecha" placeholder="YYYY-MM-DD">
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