<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Http\Requests\StoreResultadoRequest;
use App\Http\Requests\UpdateResultadoRequest;
use Illuminate\Http\Request;


class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Resultado::with('sorteo')->with('loteria')->with('animalito')->get();
        
        if ($request->ajax()) {
            
            //$items = Sorteo::all();

            return datatables()
                ->of($items)
                ->addColumn('btn','acciones')
                ->rawColumns(['btn'])
                ->toJson();
        }
        return view('resultado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResultadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultadoRequest $request)
    {
        $mensaje = ['mensaje'=>'Resultado Registrado con exito',
                    'estado'=>'info'];
        try {   
            
            $item = new Resultado;
            $item->animalito_id = $request->animalito_id;
            $item->loteria_id = $request->loteria_id;
            $item->sorteo_id = $request->sorteo_id;
            $item->dia = date('Y-m-d');
            
            $item->insertarGanadores($item->animalito_id,$item->loteria_id,$item->sorteo_id,$item->dia);

            $item->save();
            
        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }
            
        return $mensaje;   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function show(Resultado $resultado)
    {
        return $resultado;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function edit(Resultado $resultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResultadoRequest  $request
     * @param  \App\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultadoRequest $request, Resultado $resultado)
    {       
        $mensaje = ['mensaje'=>'Resultado Editado con exito',
                    'estado'=>'info'];
        try {       
                
            $resultado->animalito_id = $request->animalito_id;
            $resultado->loteria_id = $request->loteria_id;
            $resultado->sorteo_id = $request->sorteo_id;
            //$resultado->dia = $request->dia;
            $resultado->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }   
                
        return $mensaje;
    }       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resultado  $resultado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resultado $resultado)
    {
        $mensaje = ['mensaje'=>'Resultado eliminado con exito',
                    'estado'=>'info'];
        try {   
                
            $resultado->delete();    
                        
        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }
}
