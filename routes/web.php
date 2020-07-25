<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home'); 

Route::resource('usuarios', 'UserController'); 

Route::resource('productos', 'ProductosController'); 

Route::resource('categorias', 'CategoriasController'); 