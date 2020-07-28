<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Productos;

class productosControllerApi extends Controller
{

//Mostrar Lista de Registro
    public function index()
{

$producto = Productos::all();

$response = [
'success' => true,  
'message' => "Llista productes recuperada", 
'data' => $producto, 
];

return response()->json($response, 200);
 
}

// le pasamos por parametro la fecha de inicio que tiene el producto
public function precioProducto($inicio){

    $producto = Productos::where('inicio', '=', $inicio)->get();  

    return response()->json($producto, 200);
 }


}
