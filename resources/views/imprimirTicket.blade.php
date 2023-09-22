<!DOCTYPE html >
<html >
<head>
	<meta charset="utf-8">
	<title>Impresión de Ticket</title>
	<style type="text/css">
		
		.ticket , body {
			width: 270pt;
			max-width: 300pt;
		}
		*{
			font-size: 16pt;
			padding: 0pt;
			margin: 0pt;
		}
		.tabla1 td{
			width:270pt;
		}
		.p{
			width: 130pt;
			display: inline-block;
		}
		.p2{
			width: 270pt;
		}
		#monto2{
			display: none;
		}
	</style>
</head>
<body>
	
	<div class="ticket">
		<center>
			
			<div>Banca: {{ $banca }} </div>
			<div>Ticket N° {{ $ticket_id }}</div> 
			<div>{{ $fecha }}</div> 
			<div>Tikcet caduca 3 dias</div>
			<div id="monto1"></div> 
			------------------
		</center>

		@php

			$montoTotal = 0;

			function formatoHora($str){
				
				$hora = intval(substr($str,0,2));
				
				$ampm = 'AM';
					
				if( $hora > 12 ){
					$ampm = 'PM';
					$hora = $hora - 12;
				}

				if( $hora < 10 ){
					$hora = '0'.$hora;
				}

				$min = intval(substr($str,3,2));

				if( $min < 1 ){
					$min = '';
				}
				else if( $min < 10  and $min > 0 ){
					$min = ':0'.$min;
				}
				else if( $min > 10 ){
					$min = ':'.$min;
				}
				

				$tiempo = $hora.$min.$ampm;

				return $tiempo;
			}	

			$loteria = '';
			$sorteo = '';

		@endphp	


		@foreach($apuestas as $key)
			
			@php
				if($loteria != $key->loteria->nombre or $sorteo != $key->sorteo->hora){
					echo '<div class="p2">'.$key->loteria->nombre  .'-'.  formatoHora( $key->sorteo->hora ).':</div>'; 
				}

				$loteria = $key->loteria->nombre;
				$sorteo = $key->sorteo->hora;

				$montoTotal += $key->monto;

			
			@endphp
			<div class="p">{{ $key->animalito->numero }}-{{ substr($key->animalito->nombre,0,3) }}-{{ $key->monto }} </div> 		 	
		@endforeach	
		<div id='monto2'>{{ $montoTotal }}</div>
		<div>
			<center>
				<br>
			</center>
				<br>
			<center>
				<br>
			</center>
			<center>
		---------------
			</center>			
		</div>
	</div>
		
</body>
</html>

<script type="text/javascript">
	
	window.onload = function(){
		var monto2 = document.getElementById('monto2').innerHTML;
		var monto1 = document.getElementById('monto1');
		monto1.innerHTML = 'Total: '+monto2+' Bs';
		window.print();
		window.close();
	}	

</script>