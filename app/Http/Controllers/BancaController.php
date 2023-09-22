<?php

namespace App\Http\Controllers;

use App\Models\Banca;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBancaRequest;
use App\Http\Requests\UpdateBancaRequest;
use Illuminate\Support\Facades\Auth;

class BancaController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){

            $bancas = Banca::with('user')->get();

            return datatables()
                ->of($bancas)
                ->addColumn('btn','acciones')
                ->rawColumns(['btn'])
                ->toJson();
        }   
        return view('banca');
    }

    public function create()
    {
        //
    }

    public function store(StoreBancaRequest $request)
    {
        $mensaje = ['mensaje'=>'Banca registrada con exito',
                    'estado'=>'info'];
        try {

            $item = new Banca;
            $item->nombre = $request->input('nombre');   
            $item->limite = $request->input('limite');   
            $item->ilimitada = $request->input('ilimitada');   
            $item->capital = 0;   
            $item->user_id = $request->input('user_id');   
            $item->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }

        return $mensaje;
    }

    public function show(Banca $banca)
    {
        return $banca;
        
    }

    public function edit(Banca $banca)
    {
        //
    }

    public function update(UpdateBancaRequest $request, Banca $banca)
    {
         $mensaje = ['mensaje'=>'Banca editada con exito',
                    'estado'=>'info'];
        try {
 
            $banca->nombre = $request->input('nombre');
            $banca->limite = $request->input('limite');
            $banca->ilimitada = $request->input('ilimitada');
            $banca->user_id = $request->input('user_id');
                
            $banca->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }

    public function destroy(Banca $banca)
    {
        $mensaje = ['mensaje'=>'Banca eliminada con exito',
                    'estado'=>'info'];
        try {
            
            $banca->delete();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }   
    public function banca_user(){
        return Banca::where('user_id',Auth::id())->get();
    }  
    public function sin_bancas(){
        return view('sin_bancas');
    }    
    public function get_bancas(Request $request){
        
        $term = $request->term ? : '';

        $registros = Banca::where('nombre','like','%'.$term."%")->get();

        $validos = [];
                
        foreach ($registros as $key) {
                    
            $validos[] = ['id'=> $key->id ,'text'=>$key->nombre];
        }       
                
        return \Response::json($validos);
    } 
}       
        