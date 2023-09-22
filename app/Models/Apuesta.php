<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banca;
use Illuminate\Support\Facades\Auth;

class Apuesta extends Model
{
    use HasFactory;

    public function ticket(){
        return $this->belongsTo('App\Models\Ticket');
    }
    public function loteria(){
        return $this->belongsTo('App\Models\Loteria');
    }
    public function sorteo(){
        return $this->belongsTo('App\Models\Sorteo');
    }
    public function animalito(){
        return $this->belongsTo('App\Models\Animalito');
    }
    public static function dame_apuestas(){

        $con = Banca::where('user_id',Auth::id())->with('tickets.apuestas')->get();
        
        $apuestas = [];

        foreach ($con as $banca) {
                        
            foreach ($banca->tickets as $ticket) {
    
                foreach ($ticket->apuestas as $apuesta) {
                    
                    $apuestas[] = $apuesta;
                }
            }   
        } 
        return $apuestas;
    }
    public static function dame_apuestas_fechas($inicio,$final){

        $con = Banca::where('user_id',Auth::id())->with('tickets.apuestas')->get();
        
        $apuestas = [];

        foreach ($con as $banca) {
                        
            foreach ($banca->tickets as $ticket) {
    
                foreach ($ticket->apuestas as $apuesta) {
                    
                    if ($apuesta->dia>$inicio && $apuesta->dia<$final ) {
                        $apuestas[] = $apuesta;
                    }
                }
            }   
        } 
        return $apuestas;
    }           
}
