<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Productos;

class productosControllerApi extends Controller
{


    public function index()
{
// Obtenim el llistat de tots els productes
$producto = Productos::all();

$response = [
'success' => true,  // Per indicar que Tot ha anat bé
'message' => "Llista productes recuperada", // missatge
'data' => $producto, // en data posem la llista de productes
];
 
// convertim l'array associatiu a format JSON i retornem STATUS 200,
// és a dir, tot ok!
return response()->json($response, 200);
 
}

public function precioProducto($inicio){

    $producto = Productos::where('inicio', '=', $inicio)->get();  // obté una llista de productes amb preu inferior a $preu

    return response()->json($producto, 200);
 }


}
