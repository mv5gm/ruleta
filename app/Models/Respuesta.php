<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public static function respuesta($respuesta,$estado){

    	return [ $respuesta , $estado ];

    }
}
