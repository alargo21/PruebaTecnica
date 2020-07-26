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

    
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', ['categorias'=> $categorias]);
    }

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $categoria = new Categorias();
        $categoria->name = request('name');

        $categoria->save();
        return redirect('categorias');
    }

    
    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        $categoria = Categorias::findOrFail($id);

        $categoria->delete();
        
        return redirect('categorias');
    }
}
