<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas para obtener los datos en nuestra api de los productos y categorias
Route::resource('productos', 'productosControllerApi');

Route::resource('categorias', 'categoriasControllerApi');

//ruta y controlador para obtener el producto especifico segun su fecha 

Route::get('/productos/precioproducto/{inicio}','productosControllerApi@precioProducto');
