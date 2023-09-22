<?php 

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Exception;

class CustomException extends Exception
{		
	protected $codigo;
	protected $mensaje;

	public function __construct($codigo,$mensaje){
		$this->codigo = $codigo;
		$this->mensaje = $mensaje;
	}

	public function report()
	{	
		
	}	
	public function render($request){
		
		$response['mensaje'] = $this->mensaje; 
		
		//return response()->view('errors.custom',array('exception'=>$this));
		//return response()->json($response,$this->codigo);
		return [ 'mensaje'=>$this->codigo , 'codigo'=>$this->mensaje , 'estado'=>'error' ];
	}	
}		
		
?>		