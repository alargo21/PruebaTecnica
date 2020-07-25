<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //Mostrar Lista de Registro
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $users = User::where('name','LIKE','%' . $query . '%')
            ->orderBy('id','asc')
            ->paginate(5);
            return view('usuarios.index', ['users' => $users, 'search' => $query]);
        }
    }

    //Mostrar el formulario para añadir un nuevo registro
    public function create()
    {
        return view('usuarios.create'); 
    }

  
    //almacenar los registros recien creados 
    public function store(UserFormRequest $request)
    {
        $usuario = new User();

        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = bcrypt(request('password'));
        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }


        $usuario->save();

        return redirect('usuarios');
    }

    //mostrar un registro especifico
    public function show($id)
    {
        return view('usuarios.show', ['user'=> User::findOrFail($id)]); 
    }

    //mostrar formulario con los datos a editar
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', ['user'=> $user]); 
    }

    //actualizar los registros
    public function update(UserEditFormRequest $request, $id)
    {
        $this->validate(request(), ['email' => ['required', 'email', 'max:255','unique:users,email,' . $id]]);
        $usuario = User::findOrFail($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');

        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $usuario->imagen = $file->getClientOriginalName();
        }

        $pass = $request->get('password');
        if($pass != null){
            $user->password = bcrypt($request->get('password'));
        }else {
            unset($user->password);
        }

        $usuario->update();

        return redirect('/usuarios');
    }

    //elimina un registro especifico
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();
        
        return redirect('/usuarios');
    }
}
