<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{		
    use HasFactory;
    	
    public static function dias_pasados($fecha1,$fecha2){
    	
    	$segundos = (strtotime($fecha1)-strtotime($fecha2));
    	
    	$dias = $segundos/(60*60*24);

    	$horas = ($dias - (floor($dias)))*24;
    	$minutos = ($horas - (floor($horas)))*60;
    	$segundos = ($minutos - (floor($minutos)))*60;

    	$dias = floor($dias);
    	$horas = floor($horas);
    	$minutos = floor($minutos);
    	$segundos = floor($segundos);

    	if($horas < 10 ){
    		$horas = '0'.$horas;
    	}
    	if($minutos < 10 ){
    		$minutos = '0'.$minutos;
    	}
    	if($segundos < 10 ){
    		$segundos = '0'.$segundos;
    	}

    	//$dias = date('Y-m-d H:m:s',$dias);

    	return $dias.' '.$horas.':'.$minutos.':'.$segundos;
    }
    public static function dias_pasados2($fecha1,$fecha2){
    	
    	$segundos = (strtotime($fecha1)-strtotime($fecha2));

    	$minutos = $segundos/60;

    	$horas = floor($minutos/60);

    	$minutos2 = $minutos % 60;

    	$segundos2 = $segundos % 60 % 60 % 60;

    	if ($minutos2 < 10 ) {
    		$minutos2 = '0'.$minutos2;
    	}
		if ($segundos2 < 10 ) {
    		$segundos2 = '0'.$segundos2;
    	}

    	if ($segundos > 60 ) {
    		$resultado = round($segundos).'s';
    	}
    	else if($segundos > 60 && $segundos < 3600){
    		$resultado = $minutos2.':'.$segundos2.'M';
    	}
    	else{
    		$resultado = $horas.':'.$minutos2.':'.$segundos2.'H';
    	}
    	return $resultado;
    }
    public static function dias_pasados3($fecha1,$fecha2)
    {	
    	$segundos = strtotime($fecha1) - strtotime($fecha2);
    	
    	//return $segundos;

    	if ( $segundos > 0 ) {
    		
	    	$tiempo = $segundos;
	    	$signo = ($tiempo < 0 ) ? '-' : '+';
	    	$tiempo = abs($tiempo);
	    	$dias = floor($tiempo/86400);
	    	$resto_dias = $tiempo %86400;
	    	$horas = floor($resto_dias/3600);
	    	$resto_horas = $resto_dias%3600;
	    	$minutos = floor($resto_horas/60);
	    	$resto_minutos = $resto_horas%60;
	    	$segundos = floor($resto_minutos);
			
			if ($horas < 10 ) {
	    		$horas = '0'.$horas;
	    	}
			if ($minutos < 10 ) {
	    		$minutos = '0'.$minutos;
	    	}
			if ($segundos < 10 ) {
	    		$segundos = '0'.$segundos;
	    	}    		
    	}
    	else if( $segundos < 00 && $segundos > -3600 ){
    		return 'activo';
    	}
    	else{
    		return 'antiguo';
    	}
    	return $dias.' '.$horas.':'.$minutos.':'.$segundos;
    }	
    public static function formatoTiempo($n){
    	if($n < 10){
    		$n = '0'.$n;
    	}
    	return $n;
    }
    public static function formatoHora($hora){
    	
    	$previo = '';
    	$tipo = ' AM';

    	if ($hora > 12) {
    		$hora = $hora-12;
    		$tipo = ' PM';
    	}
		if ($hora < 10) {
    		$previo = '0';
    	}
    	return $previo.$hora.$tipo;
    }
}