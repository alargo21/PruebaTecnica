<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Http\Requests\ProductosFormRequest;
use App\Http\Requests\ProductosEditFormRequest;
class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    //Mostrar Lista de Registro
    public function index(Request $request){
        if($request){
            $query = trim($request->get('search'));
            $producto = Productos::where('name','LIKE','%' . $query . '%')
            ->orderBy('id','asc')
            ->paginate(5);
            return view('productos.index', ['productos' => $producto, 'search' => $query]);
        }
    }

    //Mostrar el formulario para añadir un nuevo registro
    public function create()
    {
        return view('productos.create'); 
       
    }

    //almacenar los registros recien creados
    public function store(ProductosFormRequest $request)
    {
        $producto = new Productos();

        $producto->name = request('name');
        $producto->descripcion = request('descripcion');
        $producto->inicio = request('inicio');
        $producto->fin = request('fin');
        $producto->precio = request('precio');
        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $producto->imagen = $file->getClientOriginalName();
        }

        $producto->save();

        return redirect('productos');
    }

    //mostrar un registro especifico
    public function show($id)
    {
        return view('productos.show', ['producto'=> Productos::findOrFail($id)]); 
    }

    //mostrar formulario con los datos a editar
    public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        return view('productos.edit', ['producto'=> $producto]);

    }

    //actualizar los registros
    public function update(ProductosEditFormRequest $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $producto->name = $request->get('name');
        $producto->descripcion = $request->get('descripcion');
        $producto->inicio = $request->get('inicio');
        $producto->fin = $request->get('fin');
        $producto->precio = $request->get('precio');

        if ($request->hasFile('imagen')){
            $file = $request->imagen;
            $file->move(public_path() . '/imagenes', $file->getClientOriginalName());
            $producto->imagen = $file->getClientOriginalName();
        }

        $producto->update();

        return redirect('productos');
    }

    //elimina un registro especifico
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);

        $producto->delete();
        
        return redirect('productos');
    }
}
