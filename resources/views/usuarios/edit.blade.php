    @extends('layouts.app')
{{-- //extendemos de la pagina principal para que nos lo muestre dentro de la plantilla --}}
    @section('content')

    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h2>Editar usuario: {{$user->name}} </h2>
          @if ($errors->any())
          {{-- //Nos mostrara si tenemos algun error --}}
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
      {{-- //creamos un formulario y con el metodo PATCH vamos a actualizar los datos que le pasamos en cada uno de los campos del formulario --}}
    <form action="{{ route('usuarios.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row">
      <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Nombre">
      </div>
      
      <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
      </div>
    </div>


    <div class="row">
      <div class="form-group col-md-6">
        <label>Password <span class="small">(Opcional)</span></label>
        <input type="password" class="form-control" name="password" placeholder="Contraseña">
      </div>

      <div class="form-group col-md-6">
        <label>Confirmar Password <span class="small">(Opcional)</span></label>
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">
      </div>

    </div>

    <div class="row">  
      <div class="form-group col-md-6">
        <label>Fecha Nacimiento</label>
        <input type="text" class="form-control" name="fecha" value="{{ $user->fecha }}" placeholder="YYYY-MM-DD">
      </div>


      <div class="form-group col-md-6">
        <label>Imagen</label>
        <input type="file" name="imagen" class="form-control" >
        @if ($user->imagen != "")
        <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}" height="50px" width="50px">
        @endif
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
        </div>
    </div>
    @endsection