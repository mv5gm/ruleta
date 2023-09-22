<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loteria extends Model
{
    use HasFactory;

    public function resultados(){
    	return $this->hasMany('App\Models\Resultado');
    }
    public function apuestas(){
    	return $this->hasMany('App\Models\Apuesta');
    }
}