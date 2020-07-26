<?php

namespace App;

use App\Categorias;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = [
        'name',
    ];


    public function categorias(){
            return $this->belongsToMany(Categorias::class)->withTimestamps();
        
    }

    public function asignarCategoria($categoria){

        $this->categorias()->sync($categoria, false);
    }

    public function tieneCategoria(){
        return $this->categorias->flatten()->pluck('name')->unique();
    }

}
