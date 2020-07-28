<?php

namespace App\Http\Controllers;
use App\Categorias;
use App\Productos;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //Mostrar Lista de Registro
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', ['categorias'=> $categorias]);
    }


    //almacenar los registros recien creados 
    public function store(Request $request)
    {
        $categoria = new Categorias();
        $categoria->name = request('name');

        $categoria->save();
        return redirect('categorias');
    }

    //elimina un registro especifico
    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);

        $categoria->delete();
        
        return redirect('categorias');
    }
}
