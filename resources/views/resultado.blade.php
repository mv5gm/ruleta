@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fa-solid fa-outdent fa-flip-horizontal"></i> Resultados</h1>
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
                  + Nuevo Resultado
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
                  <th>Hora</th>
                  <th>Dia</th>
                  <th>Animalito</th>
                  <th>Estado</th>
                  <th style="width: 200px">
                  	Opcion    
                  </th>
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
	<div class="modal-dialog">
	  <div class="modal-content ">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-registrar">Nuevo Resultado</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      <form method="post" action="{{route('resultado.index')}}" id="form-registrar" >
	      	
	      	@csrf
	      	
		    <div class="form-group">
	      		<label for="loteria_id-registrar">Loteria</label>
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
				
		    <div class="form-group">
	      		<label for="animalito_id-registrar">Animalito</label>
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
		    <div class="form-group">
	      		<label for="sorteo_id-registrar">Sorteo</label>
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
	      </form>	
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-registro">Cancelar</button>
	      <button type="submit" form='form-registrar' class="btn btn-primary">Guardar</button>
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>	
</div>	
	  <!-- MODAL EDITAR -->

<div class="modal fade" id="modal-primary-editar">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-editar">Editar Resultado</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      <form method="post" action="" id="form-editar" >
	      		
	      	@csrf

	      	@method('put')

	      	<input type="hidden" name="id" id="id-editar">

	      	<div class="form-group">
	      		<label for="loteria_id-editar">Loteria</label>
	      		<div class="input-group mb-3">
			      <select class="form-control" id="loteria_id-editar" name="loteria_id" required="">		
			      		<option>Loteria</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-dice"></span>
			        </div>
			      </div>
			    </div>
	      	</div>
				
		    <div class="form-group">
	      		<label for="animalito_id-editar">Animalito</label>
			    <div class="input-group mb-3">
			      <select class="form-control" id="animalito_id-editar" name="animalito_id" required="">		
			      		<option>Animalito</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-dog"></span>
			        </div>
			      </div>
			    </div>	
		    </div>
		    <div class="form-group">
	      		<label for="sorteo_id-editar">Sorteo</label>
		    	<div class="input-group mb-3">
			      <select class="form-control" id="sorteo_id-editar" name="sorteo_id" required="">		
			      		<option>Sorteo</option>
			      </select>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fa-solid fa-shuffle"></span>
			        </div>
			      </div>
			    </div>
		    </div>           
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
	      <h4 class="modal-title" id="loader-eliminar">Eliminar Loteria</h4>
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
<!-- date-range-picker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.es.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

<script>

var tabla;
var cargando = '<i class="fas fa-2x fa-sync fa-spin loader"></i>';

$(document).ready(function(){
	
	var urlLoteria = 'loteria';
	var urlAnimalito = 'animalito';
	var urlSorteo = 'sorteo';
			
	$.ajax(urlLoteria,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
			$('#loader-editar').html(cargando);
		},		
		type:'get'
	}).done(function(response){
		
		//console.log(response);
		var html = '<option value="">Loteria</option>';
		$.each(response,function(index,element){
			
			//console.log(element);

			html += '<option value="'+element.id+'">'+element.nombre+'</option>';
			//$('#'+index+'-editar').val(element);		
		});	
		$('#loteria_id-registrar').html(html);
		$('#loteria_id-editar').html(html);
			
	}).always(function(){
		$('#loader-registrar').text('Registrar Resultado');
		$('#loader-editar').text('Editar Resultado');
	});		
	
	$.ajax(urlAnimalito,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
			$('#loader-editar').html(cargando);
		},		
		type:'get'
	}).done(function(response){
		
		//console.log(response);
		var html = '<option value="">Animalito</option>';
		$.each(response,function(index,element){
			
			//console.log(element);

			html += '<option data-img_src="/img/animalitos/'+element.imagen+'" value="'+element.id+'" > '+element.numero+' '+element.nombre+'</option>';
			//$('#'+index+'-editar').val(element);		
		});	
		$('#animalito_id-registrar').html(html);
		$('#animalito_id-editar').html(html);

		$('#animalito_id-registrar').select2(options);	
		$('.select2-container--default .select2-selection--single').css({'height':'50px'});
		$('.select2-container--default').css({'width':'90%'});
			
	}).always(function(){
		$('#loader-registrar').text('Registrar Resultado');
		$('#loader-editar').text('Editar Resultado');
	});		
	
	$.ajax(urlSorteo,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
			$('#loader-editar').html(cargando);
		},		
		type:'get'
	}).done(function(response){
		
		//console.log(response);
		var html = '<option value="">Sorteo</option>';
		$.each(response,function(index,element){
			
			//console.log(element);

			html += '<option value="'+element.id+'">'+element.hora+'</option>';
			//$('#'+index+'-editar').val(element);		
		});	
		$('#sorteo_id-registrar').html(html);
		$('#sorteo_id-editar').html(html);
			
	}).always(function(){
		$('#loader-registrar').text('Registrar Resultado');
		$('#loader-editar').text('Editar Resultado');
	});
	cargar();		
});

function cargar(){	
	tabla = $('#tabla').DataTable({
		"ajax":"{{route('resultado.index')}}",
	    serverSide :true,
	    "columns":[
	        {data:'id'},
	        {data:'sorteo.hora'},
	        {data:'dia'},
	        {data:'animalito.nombre'},
	        {data:'loteria.nombre'},
	        {data:'btn'}
	    ],
	    processing:true,
	    pageLength: 5,
	    responsive: true,
	    lengthChange:true,
	    dom:'lBfrtip',
	    buttons:['copy','excel','pdf'],
	    'language':{
	        "lengthMenu": "Mostrar <select class='custom-select custom-select-sm form-control form-control-sm' >\
	                        <option value='5' >5</option>\
	                        <option value='10'>10</option>\
	                        <option value='50'>50</option> \
	                        <option value='-1'>Todos</option>\
	                        </select > Registros",
		    "loadingRecords":"Cargando...", 
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
	    },
	    'columnDefs': [ {
       		'targets': [5], // column index (start from 0)
       		'orderable': false, // set orderable false for selected columns
     	}]
	}).on('draw',function(){
			
	});	
	
	tabla.buttons().container().appendTo('#tabla_wrapper .col-md-6:eq(0)');

	$('#tabla_wrapper .dt-buttons').attr('style','float: right;margin: -5px 2px 2px 2px;');
	$('#tabla_length').attr('style','float: left;');
}		
		
function recargar(){
	tabla.ajax.reload();
	//tabla.destroy();
    //cargar();
}		

$('#form-registrar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = 'resultado/';
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
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
		$('#btn-cancelar-registro').click();
	}).always(function(){
		$('#loader-registrar').text('Nuevo Sorteo');
	});	
});		
		
$('#form-editar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = $(this).attr('action');
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
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
		$('#btn-cancelar-editar').click();
	}).always(function(){
		$('#loader-editar').text('Editar Sorteo');
	});
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
		$('#loader-eliminar').text('Eliminar Sorteo');
	});
});		

$('#btn-recargar').on('click',function(){
	recargar();
});	
function editar(id){
	
	var url = 'resultado/'+id;
	
	$('#form-editar').attr('action',url);

	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){
		
		$('#id-editar').val(response.id);
		$('#animalito_id-editar').val(response.animalito_id);
		$('#sorteo_id-editar').val(response.sorteo_id);
		$('#loteria_id-editar').val(response.loteria_id);

		$('#form-editar').attr('action',url);	
	}).always(function(){
		$('#loader-editar').text('Editar Sorteo');
	});	
}	
function eliminar(id){
	$('#form-eliminar').attr('action','resultado/'+id);
	$('#id-eliminar').val(id);
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
</script>
		
@endsection