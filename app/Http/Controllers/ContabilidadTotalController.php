<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apuesta;
use App\Models\Contabilidad;
use App\Models\Ticket;
use App\Models\Banca;
use DB;
use Illuminate\Support\Facades\Auth;

class ContabilidadTotalController extends Controller
{
   
    public function index(Request $request)
    {
         $cont = DB::select("SELECT sum(monto) as jugado , if(ganador = 1, monto*30,0 ) as ganado, sum(monto) - if(ganador = 1, monto*30,0 ) as balance,dia
            FROM `apuestas` GROUP BY dia");
        
        $cont = new Contabilidad;

        $arr = $cont->registros_total();
        $total = $cont->total_bancas()[0];

        //return $total;

        if($request->ajax()){

            return datatables()
                ->of($arr)
                ->addColumn('btn','accionesContabilidad')
                ->rawColumns(['btn'])
                ->toJson();
        }   
        
        //$bancas = Banca::all();

        return view('contabilidadTotal')->with(compact('total'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //return $request;
        $fechas = explode('/', $request->fechas);
        $inicio = $fechas[0]; 
        $final = $fechas[1];
        $porcentaje = $request->porcentaje;
        $cont = new Contabilidad;

        $arr = $cont->registros_fechas_bancas($inicio,$final,$porcentaje);

        return $arr;
    }

    
    public function show($dia)
    {
         $cont = "SELECT b.nombre banca, b.id banca_id, t.id ticket_id , a.ganador ganador ,a.monto monto,a.dia dia,an.nombre animalito,s.hora hora,lt.nombre loteria, an.imagen imagen FROM bancas b,tickets t,apuestas a , loterias lt ,sorteos s ,animalitos an  where b.id = t.banca_id and t.id = a.ticket_id and a.dia = ? and lt.id = a.loteria_id and s.id = a.sorteo_id and an.id = a.animalito_id";

        return DB::select($cont,[$dia]);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
