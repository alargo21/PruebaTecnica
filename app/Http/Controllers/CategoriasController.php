<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserEditFormRequest;

class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    
    public function index(){
        return 'prueba caegorias';
    }
}
