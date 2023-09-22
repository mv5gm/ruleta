<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resultado;

class Resultado extends Model
{
    use HasFactory;
    
    public function sorteo(){
    	return $this->belongsTo('App\Models\Sorteo');
    }
    public function loteria(){
    	return $this->belongsTo('App\Models\Loteria');
    }
    public function animalito(){
        return $this->belongsTo('App\Models\Animalito');
    }
    public function apuestas(){
        return $this->hasMany('App\Models\Apuesta');
    }
    public static function get_all(){
    	
    	$items = Resultado::with('sorteo')->with('animalito')->get();
    		
    	foreach ($items as $key) {
    		$key->hora = $key->sorteo->hora;
    		$key->dia = $key->sorteo->dia;
    		$key->animalitoNombre = $key->animalito->nombre;
    		$key->sorteoId = $key->sorteo->id;
    		
    		if($key->finalizado == 0 ){
    			$key->finalizado = 'Sin finalizar';
    		}
    		else{
    			$key->finalizado = 'Finalizado';
    		}
    	}
    	return $items;
    } 
    public function insertarGanadores($animalito_id,$loteria_id,$sorteo_id,$dia){
            
        Apuesta::where('animalito_id',$animalito_id)->where('loteria_id',$loteria_id)->where('sorteo_id',$sorteo_id)->where('dia',$dia)->update(['ganador'=>1]);
    }
}