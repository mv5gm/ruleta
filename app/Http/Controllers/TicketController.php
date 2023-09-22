<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Ticket;
use App\Models\Apuesta;
use App\Models\Banca;
use App\Models\User;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(Request $request)
    {       
        if($request->ajax()){
                
            //$banca = Banca::where()->first();
                
            $tickets = Ticket::ticketsDeUsuario();

            return datatables()
                ->of($tickets)
                ->addColumn('btn','accionesTicket')
                ->rawColumns(['btn'])
                ->toJson();
        }   

        return view('ticket');
    }

    public function create()
    {
        //
    }

    public function store(StoreTicketRequest $request)
    {
        try {

            $ticket = new Ticket;
            
            //$ticket->verificarBancaTicket($request->input('banca_id'));

            $perfil = User::where('id',Auth::id())->with('bancas')->get();
            
            $banca_id = $perfil[0]->bancas[0]->id;

            $ticket->banca_id = $banca_id;   
            
            $ticket->save();
            
            $mensaje = ['mensaje'=>'Ticket registrado con exito',
                    'estado'=>'info','item'=>$ticket->id];

            $montoTotal = 0;

            foreach ($request->apuestas as $key) {

                $ticket->verificarSorteoPasado($key['sorteo_id']);

                $ticket->verificarSorteoTicket($key['sorteo_id'],$key['loteria_id']);

                $ticket->verificarLimiteAnimalito($ticket->banca_id,$key['animalito_id'],$key['monto'],$key['sorteo_id'],$ticket);

                $apuesta = new Apuesta;
                $apuesta->ticket_id = $ticket['id'];   
                $apuesta->loteria_id = $key['loteria_id'];   
                $apuesta->animalito_id = $key['animalito_id'];   
                $apuesta->sorteo_id = $key['sorteo_id'];   
                $apuesta->ganador = 0;   
                $apuesta->monto = $key['monto'];
                $apuesta->dia = date('Y-m-d');
                $apuesta->save();

                $montoTotal += $key['monto'];    
            }

            //$capital = Banca::find($request->input('banca_id'))->capital;

            //Banca::where('id',$request->input('banca_id'))->update(['capital'=>$capital+$montoTotal]);

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error','item'=>$ticket->id];
        }

        return $mensaje;
    }

    public function show(Ticket $ticket)
    {
        return Ticket::where('id',$ticket->id)->with('apuestas.sorteo')->with('apuestas.loteria')->with('apuestas.animalito')->get();
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $mensaje = ['mensaje'=>'Ticket editado con exito',
                    'estado'=>'info'];
        try {
 
            $ticket->loteria_id = $request->input('loteria_id');
            $ticket->animalito_id = $request->input('animalito_id');
            $ticket->sorteo_id = $request->input('sorteo_id');
            $ticket->monto = $request->input('monto');
                
            $ticket->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }

    public function destroy(Ticket $ticket)
    {
        $mensaje = ['mensaje'=>'Ticket eliminado con exito',
                    'estado'=>'info'];
        try {
                
            $ticket->verificarSorteoProximo($ticket->id);
            
            $ticket->verificarSorteoCerrado($ticket->id);
            //$ticket->verificarTicketEliminar($ticket->id);
                    
            $ticket->delete();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }  
    public function imprimir($ticket_id){

        $apuestas = Apuesta::where('ticket_id',$ticket_id)->with('animalito')->with('sorteo')->with('loteria')->orderBy('loteria_id')->orderBy('sorteo_id')->get();

        $ticket = Ticket::with('banca')->find($ticket_id);
        $fecha = $ticket->created_at;

        $banca = $ticket->banca->nombre;

        return view('imprimirTicket',compact('apuestas'))
        ->with('banca',$banca)->with('ticket_id',$ticket_id)->with('fecha',$fecha);
    }    
}       
