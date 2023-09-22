<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banca;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\CustomException;

class PerfilController extends Controller
{   
    public function index(Request $request)
    {
        if($request->ajax()){

           $perfil = User::where('id',Auth::id())->with('bancas')->get();

           return $perfil;
        }   
        return view('perfil');
    }
   
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
         $mensaje = ['mensaje'=>'Contraseña cambiada con exito',
                    'estado'=>'info'];
        try {
            $user = User::find(Auth::id());
            
            if(!password_verify($request->password, $user->password)){
                throw new CustomException("Contraseña no coincide", 1);
            }
            if($request->new_password!=$request->new_password_confirm){
                throw new CustomException("Las Contraseñas no coinciden", 1);
            }
            
            $user->password = password_hash($request->new_password, PASSWORD_DEFAULT);
            
            $user->save();

        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }

        return $mensaje;
    }

    
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        //
    }
  
    public function update(Request $request, $id)
    {   
        $mensaje = ['mensaje'=>'Datos editados con exito',
                    'estado'=>'info'];
        try {
            $user = User::find(Auth::id());
            $banca = Banca::find($request->banca_id);

            $user->name = $request->name;
            $user->email = $request->email;
            $banca->limite = $request->limite;

            $user->save();
            $banca->save();
        } catch (Exception $e) {
            $mensaje = ['mensaje'=>$e->getMessage(),
                    'estado'=>'error'];
        }

        return $mensaje;
    }
  
    public function destroy($id)
    {
        //
    }
}
