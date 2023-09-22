<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Animalito;

class Animalito extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','numero','imagen'];

    public function resultados(){
    	return $this->hasMany('App\Models\Resultado');
    }
}
