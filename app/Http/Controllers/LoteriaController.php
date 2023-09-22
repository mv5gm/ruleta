<?php

namespace App\Http\Controllers;

use App\Models\Loteria;
use App\Models\Datatable;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoteriaRequest;
use App\Http\Requests\UpdateLoteriaRequest;

class LoteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){

            $loterias = Loteria::all();
                
            if ($request->has('draw')) {
                    
                return datatables()
                    ->of($loterias)
                    ->addColumn('btn','acciones')
                    ->rawColumns(['btn'])
                    ->toJson();    
            }   

            return $loterias;
        }       
        return view('loteria');
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
     * @param  \App\Http\Requests\StoreLoteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoteriaRequest $request)
    {
        //return $request->all();

        $mensaje = ['mensaje'=>'Loteria registrada con exito',
                    'estado'=>'info'];
        try {

            $item = new Loteria;
            $item->nombre = $request->input('nombre');   
            $item->save();

        } catch (\Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        //return back()->with('mensaje',$mensaje);
        return $mensaje;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loteria  $loteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Loteria::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loteria  $loteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Loteria $loteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoteriaRequest  $request
     * @param  \App\Models\Loteria  $loteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoteriaRequest $request, Loteria $loteria)
    {
        //return $request->all();

        $mensaje = ['mensaje'=>'Loteria editada con exito',
                    'estado'=>'info'];
        try {

            $loteria = Loteria::find($request->input('id'));
            $loteria->nombre = $request->input('nombre');
                
            $loteria->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loteria  $loteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Loteria $loteria)
    {
         $mensaje = ['mensaje'=>'Loteria eliminada con exito',
                    'estado'=>'info'];
        try {

            $loteria = Loteria::find($request->input('id'));
            $loteria->delete();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }
    public function get_loteria(){
        return Loteria::all();
    }
}
