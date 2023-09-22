@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fas fa-ticket"></i> Tickets</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">
          	<button type="button" class="btn btn-primary" id="btn-recargar">
                  <i class="fas fa-sync fa-spin"></i>
            </button>
          </li>
          <li class="breadcrumb-item active">
          	
          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  + Nuevo Ticket
            </button>
          </li>
        </ol>
      </div>
   </div><!-- /.container-fluid -->
  </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            
             <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabla" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Fecha</th>
                  <th>Opcion</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>    

<div class="modal fade" id="modal-primary">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content ">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-registrar">Nuevo Ticket</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="{{route('ticket.index')}}" id="form-registrar" enctype="multipart/form-data" >
	      	@csrf
	      	<div class="form-group" style="display: none">
	      		<label for='banca_id-registrar'>Banca</label>
	      		<div class="input-group mb-3">
			      <select class="form-control" id="banca_id-registrar" name="banca_id" required="">		
			      		<option>Banca</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-dice"></span>
			        </div>
			      </div>
			    </div>
	      	</div>

	      	<p id="banca_id-cargando"></p>
			<div class="form-group">
	      		<label for='loteria_id-registrar'>Loteria</label>
	      		<div class="input-group mb-3">
			      <select class="form-control" id="loteria_id-registrar" name="loteria_id" required="">		
			      		<option>Loteria</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-dice"></span>
			        </div>
			      </div>
			    </div>
	      	</div>
	      	<p id="loteria_id-cargando"></p>	
		    <div class="form-group">
	      		<label for='animalito_id-registrar'>Animalito</label>
			    <div class="input-group mb-3">
			      <select class="form-control" id="animalito_id-registrar" name="animalito_id" required="">		
			      		<option>Animalito</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-dog"></span>
			        </div>
			      </div>
			    </div>	
		    </div>
	      	<p id="animalito_id-cargando"></p>
		    <div class="form-group">
	      		<label for='sorteo_id-registrar'>Sorteo</label>
		    	<div class="input-group mb-3">
			      <select class="form-control" id="sorteo_id-registrar" name="sorteo_id" required="">		
			      		<option>Sorteo</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-shuffle"></span>
			        </div>
			      </div>
			    </div>
		    </div>
	      	<p id="sorteo_id-cargando"></p>
			<div class="form-group">
	      		<label for='monto-registrar'>Monto</label>
				<div class="input-group mb-3">
			      <input id="monto-registrar" type="number" class="form-control" name="monto" required autocomplete='off' placeholder="Monto" max="1000000" min="0.5" step="0.5">
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="">$</span>
			        </div>
			      </div>
			    </div>	
			</div>
			<button type="button" id="add_resultado" class="btn btn-primary">+ Añadir</button>
			<hr>
		    <div id="apuestas-registrar"></div>
	      </form>
	    </div>	
	    <div class="modal-footer justify-content-between">
	      		
	      	<button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-registro" >Cancelar</button>
	      	
	      	<div id="loader-registrar-2" ></div>

	      	<button type="submit" form='form-registrar' class="btn btn-primary" id="btn-registrar" >Guardar</button>
	    		
	    </div>	
	  </div>	
	  <!-- /.modal-content -->
	</div>	
</div>	

<div class="modal fade" id="modal-primary-editar">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-editar">Editar Banca</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-editar" >
	      		
	      	@csrf

	      	@method('put')

	      	<p id="ticket_id"></p>

		    <div id="apuestas-editar"></div>          
	      </form>		
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-editar" >Cancelar</button>
	      <button type="submit" form='form-editar' class="btn btn-primary">Guardar</button>
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-primary-eliminar">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-eliminar">Eliminar Ticket</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-eliminar" >
	      		
	      	@csrf

	      	@method('delete')

	      	Esta seguro de eliminar?

	      	<input type="hidden" name="id" id="id-eliminar">      
	      </form>		
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-eliminar">Cancelar</button>
	      <button type="submit" form='form-eliminar' class="btn btn-danger">Eliminar</button>
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>

@endsection
	
@section('scripts')
			
<script>

var tabla;
var cargando = '<i class="fas fa-2x fa-sync fa-spin loader"></i>';
var contadorApuestas = 0;
var arregloAnimalito = [];
var cargaRegistrarLista = 0;

$('#btn-registrar').attr('disabled',true);

$(document).ready(function(){
	
	cargar();
		
	//var urlBanca = "{{route('banca.user')}}";
	var urlLoteria = 'api/loteria';
	var urlAnimalito = 'api/animalito';
	var urlSorteo = 'api/sorteo';
			
	/*
	$.ajax(urlBanca,{
		beforeSend:function(){
			$('#banca_id-cargando').html(cargando);
		},		
		type:'get'
	}).done(function(response){
		
		//console.log(response);
		var html = '';
		$.each(response,function(index,element){
			
			//console.log(element);

			html += '<option value="'+element.id+'">'+element.nombre+'</option>';
			//$('#'+index+'-editar').val(element);		
		});	
		$('#banca_id-registrar').html(html);
		$('#banca_id-editar').html(html);
			
	}).always(function(){
		$('#banca_id-cargando').html('');
		cargaRegistrarLista++;
	});		
	*/

	$.ajax(urlLoteria,{
		beforeSend:function(){
			$('#loteria_id-cargando').html(cargando);
		},		
		type:'get'
	}).done(function(response){
		
		//console.log(response);
		var html = '';
		$.each(response,function(index,element){
			
			//console.log(element);

			html += '<option value="'+element.id+'">'+element.nombre+'</option>';
			//$('#'+index+'-editar').val(element);		
		});	
		$('#loteria_id-registrar').html(html);
		$('#loteria_id-editar').html(html);
			
	}).always(function(){
		$('#loteria_id-cargando').html('');
		cargaRegistrarLista++;
	});		
	
	$.ajax(urlAnimalito,{
		beforeSend:function(){
			$('#animalito_id-cargando').html(cargando);
		},		
		type:'get'
	}).done(function(response){
			
		var html = '';
		var i =0;
		$.each(response,function(index,element){
						
			html += '<option value="'+element.id+'" > '+element.numero+' '+element.nombre+'</option>';

			arregloAnimalito[i] = [element.id,element.imagen];
			i++;
		});	
		$('#animalito_id-registrar').html(html);
		$('#animalito_id-editar').html(html);
		
		$('#animalito_id-registrar').select2();	
		$('.select2-container--default .select2-selection--single').css({'height':'50px'});	
		$('.select2-container--default').css({'width':'90%'});	

	}).always(function(){
		$('#animalito_id-cargando').html('');
		cargaRegistrarLista++;
	});		
	
	$.ajax(urlSorteo,{
		beforeSend:function(){
			$('#sorteo_id-cargando').html(cargando);
		},		
		type:'get'
	}).done(function(response){
		
		//console.log(response);
		var html = '';
		$.each(response,function(index,element){
			
			//console.log(element);

			html += '<option value="'+element.id+'">'+formatoHora(element.hora)+'</option>';
			//$('#'+index+'-editar').val(element);		
		});	
		$('#sorteo_id-registrar').html(html);
		$('#sorteo_id-editar').html(html);
			
	}).always(function(){
		$('#sorteo_id-cargando').html('');
		cargaRegistrarLista++;
	});		

});			
$('#form-registrar').submit(function(e){
	
	if (contadorApuestas == 0) {
		
		toastr.error('Debe hacer por lo menos una apuesta');

		return false;
	}		
	else{
		e.preventDefault();
			
		var form = $(this).serialize();

		var url = '/ticket';
		
		$.ajax(url,{
			beforeSend:function(){
				$('#loader-registrar').html(cargando);
				$('#loader-registrar-2').html(cargando);
			},
			data:form,
			type:'post'
		}).done(function(response){
				
			//console.log(response);

			if (response.estado == 'info') {
				
				toastr.info(response.mensaje);

				$('#apuestas-registrar').empty();

				contadorApuestas = 0;

				imprimir(response.item);
			}	
			else{
				toastr.error(response.mensaje);
			}	

			recargar();
					
			//$('#btn-cancelar-registro').click();
				
		}).always(function(){
			$('#loader-registrar').text('Nuevo Ticket');
			$('#loader-registrar-2').text('');
		});
	}
});		

$('#form-editar').submit(function(e){
			
	return false;	
});		

$('#form-eliminar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = $(this).attr('action');
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-eliminar').html(cargando);
		},
		data:form,
		type:'post'
	}).done(function(response){
		if (response.estado == 'info') {
			toastr.info(response.mensaje);
		}
		else{
			toastr.error(response.mensaje);
		}
		recargar();
		$('#btn-cancelar-eliminar').click();
	}).always(function(){
		$('#loader-eliminar').text('Eliminar Ticket');
	});
});	
	
$('#add_resultado').on('click',function(){
	
	if(cargaRegistrarLista != 3){
		toastr.error('espere a que carguen los elementos');
		return false;

	}

	if(validarFormApuesta()[0]==1){
		
		var anadir = true;
		var animalito = $('#animalito_id-registrar').val();
		var loteria = $('#loteria_id-registrar').val();
		var sorteo = $('#sorteo_id-registrar').val();
		var monto = parseFloat($('#monto-registrar').val());

		var animalitoText = $('#animalito_id-registrar option:selected').text();
		var loteriaText = $('#loteria_id-registrar option:selected').text();
		var sorteoText = $('#sorteo_id-registrar option:selected').text();
		var animalitoImg = '';

		for(var i = 0; i < arregloAnimalito.length;i++){
			
			if(arregloAnimalito[i][0] == animalito){
				
				animalitoImg = arregloAnimalito[i][1];
			}	
		}		
		
		var html = '<div class="apuesta row alert alert-info alert-dismissible">\
	                  <button type="button" class="close remove_apuesta" aria-hidden="true" >&times;</button>\
	                  <div class="col-sm-1">\
	                  <img src="/img/animalitos/'+animalitoImg+'" width="50px"height="50px" />\
	                  </div>\
	                  <div class="col-sm-9">\
	                  Animalito:'+animalitoText+'<br>\
	                  Loteria:'+loteriaText+'<br>\
	                  Sorteo:'+sorteoText+'<br>\
	                  Monto:<span class="monto-mostrar">'+monto+'</span>Bs\
	                  <input type="hidden" name="apuestas['+contadorApuestas+'][animalito_id]" value="'+animalito+'" class="animalito_id">\
	                  <input type="hidden" name="apuestas['+contadorApuestas+'][loteria_id]" value="'+loteria+'" class="loteria_id">\
	                  <input type="hidden" name="apuestas['+contadorApuestas+'][sorteo_id]" value="'+sorteo+'" class="sorteo_id">\
	                  <input type="hidden" name="apuestas['+contadorApuestas+'][monto]" value="'+monto+'"  class="monto">\
	                </div>\
	                </div>';
	    
	    if ($('#apuestas-registrar').html() != "" ){
				
			//console.log($('.apuesta input[class="animalito_id"]:last'))	

			var animalitoHidden = $('.apuesta input[class="animalito_id"]:last')[0].value;
			var loteriaHidden = $('.apuesta input[class="loteria_id"]:last')[0].value;
			var sorteoHidden = $('.apuesta input[class="sorteo_id"]:last')[0].value;
			var montoHidden = $('.apuesta input[class="monto"]:last')[0];
			var montoMostrar = $('.apuesta span[class="monto-mostrar"]:last')[0];
			var apuesta = $('.apuesta:last');

			//console.log(montoMostrar);

			if (animalito == animalitoHidden && loteria == loteriaHidden && sorteo == sorteoHidden) {

				monto += parseFloat(montoHidden.value);

				montoHidden.value = monto;

				montoMostrar.innerHTML = monto;
				
				apuesta.animate({
					opacity:0.1
				},'fast',function(e){
					
					$(this).animate({
						opacity:1
					},'fast');
				});

				toastr.info('monto añadido a la apuesta');

				anadir = false;
			}
		}	

		if(anadir){

			$('#apuestas-registrar').append(html);
		
			contadorApuestas++;
			
			$('#btn-registrar').attr('disabled',false);
		}
	}		
	else{
		toastr.error(validarFormApuesta()[1]);
	}
});

$('#apuestas-registrar').on('click','.remove_apuesta',function(){
	
	var parent = $(this).parent().remove();

	contadorApuestas--;
	
	//alert(contadorApuestas);

	if(contadorApuestas == 0){
		$('#btn-registrar').attr('disabled',true);
	}
});

$('#btn-recargar').on('click',function(){
	recargar();
});

function ver(id){
	
	var url = 'ticket/'+id;
	
	$('#ticket_id').html('Ticket Numero: '+id);
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){
		
		$('#apuestas-editar').html('');			
					
		//console.log(response[0].apuestas[0]);	

		$.each(response[0].apuestas,function(index,element){
			
			var ganador = 'Perdedor'	
			
			if ( element.ganador == '1' ) {
				
				ganador = 'Ganador';
			}	

			var html = '<div class="row alert alert-info alert-dismissible">\
		                  <div class="col-sm-1">\
		                  <img src="/img/animalitos/'+element.animalito.imagen+'"width="50px" >\
		                  </div>\
		                  <div class="col-sm-9">\
		                  Animalito:'+element.animalito.nombre+'<br>\
		                  Loteria:'+element.loteria.nombre+'<br>\
		                  Sorteo:'+formatoHora(element.sorteo.hora)+'<br>\
		                  Monto:'+element.monto+' Bs<br>\
		                  Estado:'+ganador+' \
		                  <input type="hidden" name="apuestas['+index+'][animalito_id]" value="'+element.animalito.id+'" class="animalito" >\
		                  <input type="hidden" name="apuestas['+index+'][loteria_id]" value="'+element.loteria.id+'" class="loteria" >\
		                  <input type="hidden" name="apuestas['+index+'][sorteo_id]" value="'+element.sorteo.id+'" class="sorteo" >\
		                  <input type="hidden" name="apuestas['+index+'][monto]" value="'+element.monto+'" class="monto" >\
		                </div>\
		                </div>';

		    $('#apuestas-editar').append(html);			
		});	

		$('#form-editar').attr('action',url);

	}).always(function(){
		$('#loader-editar').text('Ver Ticket');
	});	
}	
function eliminar(id){
	$('#form-eliminar').attr('action','ticket/'+id);
}	
			
function imprimir(id) {

	window.open('/imprimirTicket/'+id,'Imprimir Ticket '+ id,'width="300", height="500"');
	//imp.document.write('holis');
	//imp.document.close();
	//window.print();
	//imp.close();

}

function cargar(){
	
	tabla = $('#tabla').DataTable({
		"ajax":"{{route('ticket.index')}}",
	    serverSide :true,
	    "columns":[
	        {data:'id'},
	        {data:'fecha'},
	        {data:'btn'}
	    ],
	    processing:true,
	    pageLength: 5,
	    responsive: true,
	    dom: 'lBfrtip',
	    buttons: ['copy','excel','pdf'],
	    'language':{
	        "lengthMenu": "Mostrar <select class='custom-select custom-select-sm form-control form-control-sm' >\
	                        <option value='5' >5</option>\
	                        <option value='10'>10</option>\
	                        <option value='50'>50</option> \
	                        <option value='-1'>Todos</option>\
	                        </select > Registros",
	    "loadingRecords":"<div class='preloader' ><i class='fa fa-spinner'></i></div>Cargando...", 
	    "zeroRecords":"Nada encontrado - disculpa",
	        "info":"mostrando la pagina _PAGE_ de _PAGES_",
	        "infoEmpty":"No hay resultados disponibles",
	        "infoFiltered":"(filtrado de _MAX_ registros totales)",
	        "search":"Buscar",
	        "paginate":{
	            "next":"siguiente",
	            "previous":"Anterior"
	        },
	        "processing":'Procesando...',                    
	        "emptyTable":"No hay Registros",                   
	    }

	});	

	tabla.buttons().container().appendTo('#tabla_wrapper .col-md-6:eq(0)');
	$('#tabla_wrapper .dt-buttons').attr('style','float: right;margin: -5px 2px 2px 2px;');
	$('#tabla_length').attr('style','float: left;');		

}

function recargar(){
	tabla.destroy();
    cargar();
}
function validarFormApuesta(){
	
	var valido = [1,''];
	
	if($('#animalito_id-registrar').val()==''){
		valido = [0,'debe llenar el campo Animalito'];
	}
	else if($('#loteria_id-registrar').val()==''){
		valido = [0,'debe llenar el campo Loteria'];
	}
	else if($('#sorteo_id-registrar').val()==''){
		valido = [0,'debe llenar el campo Sorteo'];
	}
	else if($('#monto-registrar').val()==''){
		valido = [0,'debe llenar el campo Monto'];
	}
	else{

	}			
	return valido;
}	
function custom_template(obj){

	var data = $(obj.element).data();
	var text = $(obj.element).text();

	if (data && data['img_src']) {
		img_src = data['img_src'];
		template = $("<div><img src=\""+ img_src+"\" style=\"width:50px;height:50px;\"/><span style=\"font-weight:0;font-size:12pt;text-align:right;\">"+text+"</span></div>");
		return template; 
	}
}	
var options = {
	'templateSelection':custom_template,
	'templateResult':custom_template,
}

function formatoHora(str){
				
	var hora = parseInt(str.substr(0,2),10);
	
	var ampm = 'AM';
		
	if( hora > 12 ){
		ampm = 'PM';
		hora = hora - 12;
	}

	if( hora < 10 ){
		hora = '0' + hora;
	}

	var min = parseInt(str.substr(3,2),10);

	if(min < 1 ){
		min = '';
	}
	else if( min < 10  && min > 0 ){
		min = ':0' + min;
	}
	else if( min > 10 ){
		min = ':' + min;
	}
	

	tiempo = hora + min + ampm;

	return tiempo;
}
</script>
		
@endsection