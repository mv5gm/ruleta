<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use App\Models\Sorteo;
use App\Models\Loteria;
use App\Models\Resultado;

class Sorteo extends Model
{
    use HasFactory;

    protected $fillable = ['dia','hora'];

    public function resultados(){
    	return $this->hasMany('App\Models\Resultado');
    }
	public function apuestas(){
    	return $this->hasMany('App\Models\Apuesta');
    }
    public function registrar($request){
    	
    	$loterias = Loteria::all();
    	$horaInicio = $request->input('hora-inicio');
        $horaFinal = $request->input('hora-final');

		$fechas = explode(' - ', $request->input('fechas'));

        $fechaInicio = Carbon::parse($fechas[0]);
        $fechaFinal = Carbon::parse($fechas[1]);

        $diferenciaFecha = $fechaInicio->diffInDays($fechaFinal);

        $diferenciaHoras = $horaFinal - $horaInicio;

        if($diferenciaFecha >= 0 ){

        	if ($diferenciaHoras > 0 ) {
	        			
	        	for ($i = 0; $i <= $diferenciaFecha; $i++) { 
	        			
	        		if($i > 0){
	        			$fecha = $fechaInicio->addDay();
	        		}	
	        		else{
	        			$fecha = $fechaInicio;
	        		}	
	        		$fecha = $fecha->format('Y-m-d');
	        			
	        		for ($j = 0; $j <= $diferenciaHoras; $j++) { 
	        			
	        			$obj = new Sorteo;
	        			$obj->hora = $horaInicio + $j;
	        			$obj->dia = $fecha;
	        			$obj->save();
	        			
	        			foreach ($loterias as $key) {
	        				$objResul = new Resultado;
	        				$objResul->sorteo_id = $obj->id;	
	        				$objResul->loteria_id = $key->id;	
	        				$objResul->animalito_id = 1;
	        				$objResul->finalizado = 0;
	        				$objResul->save();	
	        			}
	        		}
	        	}	
        	}		
        	else{	
        		return 'nojoda horas';
        	}		
        }		
        else{	
	        return 'nojoda dias';
        }		 
    }
    public static function get_sorteos(){
		
		$sorteos = Sorteo::all();  
 		
 		foreach ($sorteos as $key) {
 			
 			$hora = $key->hora;
 			$key->hora = Fecha::formatoTiempo($key->hora);
 			$key->dia = $key->dia;
 						
			$fechaActual = date('Y-m-d H:m:s');
			
			$fr = $key->dia.' '.$key->hora.':00:00';
			
			$diferencia = Fecha::dias_pasados3($fr,$fechaActual);

			$key->estado = $diferencia;

 			$key->hora = Fecha::formatoHora($hora);
 		}

 		return $sorteos;
    }
    public static function get_sorteos_dia(){

    	$diaActual = Carbon::now()->format('Y-m-d');
    	$horaActual = Carbon::now()->format('H');
    	$sorteos = Sorteo::where('dia',$diaActual)->where('hora','>=',$horaActual)->get();
    	
    	foreach ($sorteos as $key) {
 			
 			$key->hora = Fecha::formatoHora($key->hora);
 		}

    	return $sorteos; 
    }
}