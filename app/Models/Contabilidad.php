<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apuesta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Contabilidad extends Model
{
    use HasFactory;

    public function registros(){

    	//esta consulta devuelve el lo jugado,ganado y el balance de x dia de las bancas del usuario logueado

    	$sql = 'SELECT sum(a.monto) jugado,sum(if( a.ganador > 0 , a.monto*30 , 0 )) ganado, (sum(a.monto) -sum(if( a.ganador > 0 , a.monto*30 , 0 ))) balance,a.dia dia FROM users u, bancas b,tickets t, apuestas a WHERE u.id = ? and u.id = b.user_id and b.id = t.banca_id and t.id = a.ticket_id GROUP BY a.dia';

        return DB::select($sql,[Auth::id()]);
    }
    public function registros_total(){
        //esta consulta devuelve lo jugado,ganado y el balance de x dia de todas las bancas excepto las ilimitadas
        
        $sql = 'SELECT sum(a.monto) jugado,sum(if( a.ganador > 0 , a.monto*30 , 0 )) ganado, (sum(a.monto) - sum(if( a.ganador > 0 , a.monto*30 , 0 ))) balance,a.dia dia FROM users u, bancas b,tickets t, apuestas a WHERE u.id = b.user_id and b.id = t.banca_id and t.id = a.ticket_id and b.ilimitada = 0 GROUP BY a.dia';

        return DB::select($sql);   
    }
    public function registros_fechas($inicio,$final){

    	//esta consulta devuelve lo jugado,ganado y el balance por dia entre 2 fechas 

    	$sql = 'SELECT sum(a.monto) jugado,sum(if( a.ganador > 0 , a.monto*30 , 0 )) ganado, (sum(a.monto) -sum(if( a.ganador > 0 , a.monto*30 , 0 ))) balance ,a.dia dia FROM users u, bancas b,tickets t, apuestas a WHERE u.id = ? and u.id = b.user_id and b.id = t.banca_id and t.id = a.ticket_id and a.dia >= ? and a.dia <= ? GROUP BY a.dia';

    	return DB::select($sql,[Auth::id(),$inicio,$final]);
    }
    public function registros_fechas_total($inicio,$final,$banca_id){
        //esta consulta devuelve lo jugado,ganado y el balance por dia entre 2 fechas de la banca selccionada

        $sql = 'SELECT sum(a.monto) jugado,sum(if( a.ganador > 0 , a.monto*30 , 0 )) ganado, (sum(a.monto) -sum(if( a.ganador > 0 , a.monto*30 , 0 ))) balance ,a.dia dia FROM bancas b,tickets t, apuestas a WHERE b.id=? and b.id = t.banca_id and t.id = a.ticket_id and a.dia >= ? and a.dia <= ? GROUP BY a.dia';

        return DB::select($sql,[$banca_id,$inicio,$final]);    
    }
    public function registros_fechas_bancas($inicio,$final,$porcentaje){
        //esta consulta devuelve lo que deben pagar las bancas de su balance entre 2 fechas 
        $sql='SELECT (sum(a.monto) -sum(if( a.ganador > 0 , a.monto*30 , 0 )))* ? deuda , u.name usuario , b.nombre banca FROM users u , bancas b , tickets t , apuestas a WHERE u.id=b.user_id and b.id=t.banca_id and t.id=a.ticket_id and a.dia >= ? and a.dia <= ? and b.ilimitada = 0 GROUP BY banca'; 
        return DB::select($sql,[$porcentaje*0.01,$inicio,$final]);    
    }

    public function total(){

    //esta consulta devuelve el lo jugado,ganado y el balance de todas las bancas del usuario logueado

    	$sql = 'SELECT sum(a.monto) jugado,sum(if( a.ganador > 0 , a.monto*30 , 0 )) ganado, (sum(a.monto) -sum(if( a.ganador > 0 , a.monto*30 , 0 ))) balance FROM users u, bancas b,tickets t, apuestas a WHERE u.id = ? and u.id = b.user_id and b.id = t.banca_id and t.id = a.ticket_id';

        return DB::select( $sql,[Auth::id()]) ;

	}
    public function total_bancas(){

    //esta consulta devuelve el lo jugado,ganado y el balance de todas las bancas execpto de las bancas ilimitadas

        $sql = 'SELECT sum(a.monto) jugado,sum(if( a.ganador > 0 , a.monto*30 , 0 )) ganado, (sum(a.monto) -sum(if( a.ganador > 0 , a.monto*30 , 0 ))) balance FROM bancas b,tickets t, apuestas a WHERE b.id = t.banca_id and t.id = a.ticket_id and b.ilimitada = 0 ';

        return DB::select( $sql ) ;
    }
}