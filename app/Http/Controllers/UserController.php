<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        if ($request->ajax()) {
                
            $users = User::all();
                    
            if($request->has('draw')){
                    
                return datatables()
                    ->of($users)
                    ->addColumn('btn','acciones')
                    ->rawColumns(['btn'])
                    ->toJson();    
            }

            return $users;

        }  
        else{
            return view('users');
        } 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {           
        $mensaje = ['mensaje'=>'Usuario registrado con exito',
                    'estado'=>'info'];
        try {       

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]); 

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }       

        return $mensaje;
    }       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
       
       //return $request;

       $mensaje = ['mensaje'=>'Usuario editado con exito',
                    'estado'=>'info'];
        try {       

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->roles()->sync($request->role); 
            $user->save(); 

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }       

        return $mensaje;

    }       

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $mensaje = ['mensaje'=>'Usuario eliminado con exito',
                    'estado'=>'info'];
        try {
            
            $user->delete();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }
            
        return $mensaje;
    }
}
