<?php

namespace App\Http\Controllers;

use App\Models\Animalito;
use App\Models\Datatable;
use App\Http\Requests\StoreAnimalitoRequest;
use App\Http\Requests\UpdateAnimalitoRequest;
//use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AnimalitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {           
        if($request->ajax()){

            if ($request->has('draw')) {
                    
                //$tabla = Datatable::Animalito($request);
                //return $tabla;    
                $animalitos = Animalito::all();

                return datatables()
                    ->of($animalitos)
                    ->addColumn('btn','acciones')
                    ->addColumn('imagen','imagenes')
                    ->rawColumns(['btn','imagen'])
                    ->toJson();
            }   
            return Animalito::all();
        }   
        return view('animalito');
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
     * @param  \App\Http\Requests\StoreAnimalitoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnimalitoRequest $request)
    {
        //$item = Animalito::create($request->input());
        $mensaje = ['mensaje'=>'animalito registrado con exito',
                    'estado'=>'info'];
        try {

            $item = new Animalito;
            $item->nombre = $request->input('nombre');
            $item->numero = $request->input('numero');
            
            if($request->hasFile('imagen')){
                
                $file = $request->file();

                //$item->imagen = $request->file('imagen')->store('public');
                
                $filename = $item->nombre.'.'.$file['imagen']->getClientOriginalExtension();

                $file['imagen']->move(public_path('img/animalitos'), $filename);
                $animalito->imagen = $filename;
            }   
                
            $item->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }
            
        return back()->with('mensaje',$mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animalito  $animalito
     * @return \Illuminate\Http\Response
     */
    public function show(Animalito $animalito)
    {
        return Animalito::find($animalito);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animalito  $animalito
     * @return \Illuminate\Http\Response
     */
    public function edit(Animalito $animalito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnimalitoRequest  $request
     * @param  \App\Models\Animalito  $animalito
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnimalitoRequest $request, Animalito $animalito)
    {
        //$item = Animalito::update($request->input());
        $mensaje = ['mensaje'=>'animalito editado con exito',
                    'estado'=>'info'];
        try {

            //$item = Animalito::find($request->input('id'));
            $animalito->nombre = $request->input('nombre');
            $animalito->numero = $request->input('numero');
            
           if($request->hasFile('imagen')){
                
                $file = $request->file();

                //$item->imagen = $request->file('imagen')->store('public');
                
                $filename = $animalito->nombre.'.'.$file['imagen']->getClientOriginalExtension();

                $file['imagen']->move(public_path('img/animalitos'), $filename);
                $animalito->imagen = $filename;
            }
                
            $animalito->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return back()->with('mensaje',$mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animalito  $animalito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animalito $animalito)
    {
        $mensaje = ['mensaje'=>'animalito eliminado con exito',
                    'estado'=>'info'];
        try {

           $animalito->delete();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e,
                    'estado'=>'error'];
        }
            
        return back()->with('mensaje',$mensaje);
    }
    public function get_animalitos(Request $request){

        $term = $request->term ? : '';

        $registros = Animalito::where('nombre','like','%'.$term."%")->get();

        $validos = [];
                
        foreach ($registros as $key) {
                    
            $validos[] = ['id'=> $key->id ,'text'=>$key->nombre];
        }       
                
        return \Response::json($validos);
    }
    public function get_animalito(){
        return Animalito::all();
    }
}