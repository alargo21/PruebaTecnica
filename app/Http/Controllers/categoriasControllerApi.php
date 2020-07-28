<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorias;

class categoriasControllerApi extends Controller
{

    //Mostrar Lista de Registro
    public function index()
    {
    // obtener la lista de las categorias
    $categoria = Categorias::all();
    
    $response = [
    'success' => true,  
    'message' => "Lista de categorias recuperada", 
    'data' => $categoria, 
    ];
     
    // convertimos el array asociativo a formato JSON y devolvemos STATUS 200
    return response()->json($response, 200);
     
    }
}
