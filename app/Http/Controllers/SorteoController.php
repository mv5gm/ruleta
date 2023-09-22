<?php

namespace App\Http\Controllers;

use App\Models\Sorteo;
use App\Models\Resultado;
use App\Models\Animalito;
use App\Http\Requests\StoreSorteoRequest;
use App\Http\Requests\UpdateSorteoRequest;
use Illuminate\Http\Request;
use DB;

class SorteoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $items = Sorteo::all();

            if ($request->has('draw')) {
                    
                return datatables()
                    ->of($items)
                    ->addColumn('btn','acciones')
                    ->rawColumns(['btn'])
                    ->toJson();    
            }
            return $items;
        }
        return view('sorteo');
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
     * @param  \App\Http\Requests\StoreSorteoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSorteoRequest $request)
    {       

        $mensaje = ['mensaje'=>'Sorteo registrado con exito',
                    'estado'=>'info'];
        try {

            $sorteo = new Sorteo;
            $sorteo->hora =$request->hora;
            $sorteo->save();

        } catch (\Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sorteo  $sorteo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Sorteo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sorteo  $sorteo
     * @return \Illuminate\Http\Response
     */
    public function edit(Sorteo $sorteo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSorteoRequest  $request
     * @param  \App\Models\Sorteo  $sorteo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSorteoRequest $request, Sorteo $sorteo)
    {
         $mensaje = ['mensaje'=>'Sorteo editado con exito',
                    'estado'=>'info'];
        try {

            $sorteo->hora = $request->hora;
            $sorteo->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }       
                
        return $mensaje;
    }       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sorteo  $sorteo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $mensaje = ['mensaje'=>'Sorteo eliminado con exito',
                    'estado'=>'info'];
        try {   
                
            $item = Sorteo::find($id);
            $item->delete();    
                        
        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }
    public function get_sorteo(){
        return Sorteo::all();
    }
}