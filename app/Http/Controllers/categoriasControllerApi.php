<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorias;

class categoriasControllerApi extends Controller
{
    public function index()
    {
    // Obtenim el llistat de tots els productes
    $categoria = Categorias::all();
    
    $response = [
    'success' => true,  // Per indicar que Tot ha anat bé
    'message' => "Llista productes recuperada", // missatge
    'data' => $categoria, // en data posem la llista de productes
    ];
     
    // convertim l'array associatiu a format JSON i retornem STATUS 200,
    // és a dir, tot ok!
    return response()->json($response, 200);
     
    }
}
