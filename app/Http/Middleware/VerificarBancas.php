<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Apuesta;
use App\Models\Banca;

class VerificarBancas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {       
        $con = Banca::dame_bancas();
        
        if (count($con) > 0 ) {
            return $next($request);        
        }   
        else{
            return redirect('sin_bancas');
        }
    }
}
