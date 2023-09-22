<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Banca extends Model
{
    use HasFactory;
    
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
     public function tickets(){
        return $this->hasMany('App\Models\Ticket');
    }
    public static function dame_bancas(){
    	//Devuelve todas las bancas de un usuario
    	return Banca::where('user_id',Auth::id())->get();
    }
}
