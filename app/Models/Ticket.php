<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Respuesta;
use App\Exceptions\CustomException;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'capital'
    ];	
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function banca(){
        return $this->belongsTo('App\Models\Banca');
    }
    public function apuestas(){
        return $this->hasMany('App\Models\Apuesta');
    }
    /*esta funcion verifica que la banca del ticket que se va a registrar pertenezca a las bancas del usuario en session*/
        
    public function verificarBancaTicket($banca_id){

        $bancas = Banca::where( 'user_id' , Auth::id() )->where('id',$banca_id)->count();

        if( $bancas < 1 ){
	    	throw new CustomException("Usuario incorrecto",1);
        }	
    }		
    //funcion verifica que el sorteo este cerrado para poder comprar el ticket
    public function verificarSorteoTicket($sorteo_id,$loteria_id){

    	$resultados = Resultado::where('sorteo_id',$sorteo_id)->where('loteria_id',$loteria_id)->where('dia',date('Y-m-d'))->count();
    		
    	if( $resultados > 0 ){
	    	throw new CustomException("Sorteo Cerrado",1);
        }		
    }		
    //esta funcion verifica si el animalito supera o no el limite de la banca al comprar el ticket
    public function verificarLimiteAnimalito($banca_id,$animalito_id,$monto,$sorteo_id,Ticket $ticket){
    	$banca = Banca::find($banca_id);
    	$limite = $banca->limite;

    	//obtengo la cantidad de dinero que se ha apostado por ese animalito el dia de hoy para el sorteo de esa hora 

    	$sql="select sum(apuestas.monto) as monto from tickets,apuestas where tickets.id = apuestas.ticket_id and tickets.banca_id = ? and apuestas.animalito_id = ? and dia = ? and apuestas.sorteo_id = ? ";

	    $montoTotal = reset(DB::select($sql,[$banca_id,$animalito_id,date('Y-m-d'),$sorteo_id])[0]);
	    
	    //sumo esa cantidad 

	    $montoTotal += $monto;

	    if( $montoTotal == null ){
	    	$montoTotal = 0;
	    }

	    if ( $montoTotal > $limite ) {

	    	$ticket->delete();

            $this->delete();
	    	
	    	throw new CustomException("Monto sobrepasa el limite por animalito en un sorteo",1);
	    }
    }
    //esta funcion verifica si el ticket tiene sorteo cerrado para evitar eliminar el ticket de tener sorteo cerrado
    	
    public function verificarSorteoCerrado($ticket_id){
    	
    	$sql="select * from tickets t , apuestas a ,sorteos s,resultados r where t.id = ? and t.id = a.ticket_id and s.id=a.sorteo_id and r.sorteo_id=s.id and r.dia = a.dia ";
	    
	    $resultados = DB::select($sql,[$ticket_id]);

	    if (count($resultados) > 0 ) {
            //$this->delete();
	    	throw new CustomException("Sorteo Cerrado no puedes eliminar", 1);
	    }
    }	  
        
    //esta funcion verifica el tiempo del sorteo si falta para que se realize el sorteo devuelve true si no falta false
    //lo uso en el eliminar 

    public function verificarSorteoProximo($ticket_id){

        $sql="SELECT if( CURRENT_TIME()-s.hora < 0 , true , false ) resultado FROM tickets t , apuestas a , sorteos s WHERE t.id = a.ticket_id and s.id = a.sorteo_id and t.id = ? GROUP BY t.id";
            
        $resultados = DB::select($sql,[$ticket_id]);

        if (count($resultados)) {
            
            $resultados = $resultados[0]->resultado;

            if ( !$resultados ) {
                //$this->delete();
                throw new CustomException("Sorteo Cerrado no puedes eliminar", 1);
            }    
        }
    }       

    //verifica si ya paso o no la hora del sorteo 
    //lo uso en el registro de ticket

    public function verificarSorteoPasado($sorteo_id){
        
        $sql='SELECT if(CURRENT_TIME() - s.hora < 0 , true , false) resultado FROM sorteos s WHERE s.id = ?';

        $resultados = DB::select($sql,[$sorteo_id]);

        if (count($resultados)) {
            
            $resultados = $resultados[0]->resultado;                
            
            if ( !$resultados ) {
                
                $this->delete();

                throw new CustomException("Sorteo Cerrado no puedes apostar", 1);
            }
        }
    }   
    //verifica si un ticket tiene una apuesta con resultado , en caso de tenerlo devuelve true para permitir eliminarlo 

    public function verificarTicketEliminar($ticket_id){
        $sql='SELECT t.id id FROM users u, bancas b,tickets t ,apuestas a ,resultados r WHERE u.id = 3 and u.id = b.user_id and b.id = t.banca_id and t.id = a.ticket_id and a.animalito_id=r.animalito_id and a.sorteo_id=r.sorteo_id and a.loteria_id=r.loteria_id and t.id = 44 order by t.id desc';
            
        $resultados = DB::select($sql,[$ticket_id]);

        if (count($resultados) > 0 ) {
            throw new CustomException("No puedes eliminar un ticket con resultados", 1);
        }
    }   
    //retorna todos los tickets con apuestas del usuario

    public function ticketsDeContabilidad($dia){
        
        $con = Banca::where('user_id',Auth::id())->with('tickets.apuestas')->get();
        
        $arr = [];

        foreach ($con as $key ) {
            
            foreach ($key->tickets as $key2) {
                
                foreach ($key2->apuestas as $key3) {
                    
                    $arr[] = $key3;
                }
            }
        }
        return $arr;
    }   
    //Devuelve los tickets del usuario logueado

    public static function ticketsDeUsuario(){
        $sql='SELECT t.id id, t.created_at fecha FROM users u, bancas b,tickets t WHERE u.id = ? and u.id = b.user_id and b.id = t.banca_id order by t.id desc';
        return DB::select($sql,[Auth::id()]);

    }

    public function getCreatedAtAtribute($value){
        return date('Y-m-d H:m:s',$value);
    }   
    public function eliminarUltimo(){
        Ticket::orderBy('id','desc')->first()->delete();
    }
}		