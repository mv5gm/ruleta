@extends('layouts.app')

@section('css')

<!-- date-range-picker -->
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

<!-- iCheck -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


@endsection

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fa-solid fa-random"></i> Sorteos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">
          	
          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  + Nuevo Sorteo
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
          	<div class="card">
          		<div class="card-body">
          			<table id="tabla" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>Id</th>
		                  <th>Hora</th>
		                  <th style="width: 200px">
		                  	Opcion    
		                  </th>
		                </tr>
		                </thead>
		                <tbody>
		                
		                </tbody>
		            </table>
          		</div>
          	</div>
          </div>
        </div>
      </div>
</section>    

<div class="modal fade" id="modal-primary">
	<div class="modal-dialog">
	  <div class="modal-content ">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-registrar">Nuevo Sorteo</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      <form method="post" action="{{route('sorteo.index')}}" id="form-registrar">
	      	@csrf
	      	<div class="input-group mb-3">
		      <input id="hora-registrar" type="time" class="form-control" name="hora" required="" autocomplete='off' placeholder="Hora">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-clock"></span>
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
	      <div style="display: flex;flex-direction: column">
	      	<h4 class="modal-title" id="loader-editar">Editar Sorteo</h4>
	      	<p id="subtitulo-editar" ></p>
	      </div>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      <form method="post" action="" id="form-editar" >
	      			
	      	@csrf	

	      	@method('put')

	      	<input type="hidden" name="id" id="id-editar">

	      	<div class="input-group mb-3">
		      <input id="hora-editar" type="time" class="form-control" name="hora" required="" autocomplete='off' placeholder="Hora">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-clock"></span>
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
	      <h4 class="modal-title" id="loader-eliminar">Eliminar Sorteo</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-eliminar" >
	      		
	      	@csrf

	      	@method('delete')

	      	Esta seguro de eliminar el sorteo ?
      
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

<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.es.js')}}"></script>

<script>

$.fn.select2.defaults.set('language', 'es');

var tabla;
var tablaResultados;
var cargando = '<i class="fas fa-2x fa-sync fa-spin loader"></i>';

$(document).ready(function(){

	cargar();
});

function cargar(){	
	tabla = $('#tabla').DataTable({
		"ajax":"{{route('sorteo.index')}}",
	    serverSide :true,
	    "columns":[
	        {data:'id'},
	        {data:'hora'},
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
		    "loadingRecords":cargando, 
		    "zeroRecords":"Nada encontrado - disculpa",
		    "info":"mostrando la pagina _PAGE_ de _PAGES_",
		    "infoEmpty":"No hay resultados disponibles",
		    "infoFiltered":"(filtrado de _MAX_ registros totales)",
		    "search":"Buscar",
		    "paginate":{
	            "next":"siguiente",
	            "previous":"Anterior"
	        },
	        "processing":cargando,                    
	        "emptyTable":"No hay Registros",                   
	    },
	    'columnDefs': [ {
       		'targets': [2], // column index (start from 0)
       		'orderable': false, // set orderable false for selected columns
     	}]
	}).on('draw',function(){
			
	});	
	
	tabla.buttons().container().appendTo('#tabla_wrapper .col-md-6:eq(0)');

	$('#tabla_wrapper .dt-buttons').attr('style','float: right;margin: -5px 2px 2px 2px;');
	$('#tabla_length').attr('style','float: left;');

	// Check all 
   $('#checkall').click(function(){
      if($(this).is(':checked')){
         $('.delete_check').prop('checked', true);
      }else{
         $('.delete_check').prop('checked', false);
      }
   });
}		
		
function recargar(){
	tabla.ajax.reload();
}		
		
		
$('#form-registrar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = 'sorteo/';
	
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

function editar(id){
	
	var url = 'sorteo/'+id;
	
	$('#form-editar').attr('action',url);
	$('#id-editar').val(id);

	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){

		$('#id-editar').val(response.id);
		$('#hora-editar').val(response.hora);

		$('#loader-editar').text('Editar Sorteo');

	}).always(function(){

	});	
}	
function eliminar(id){
	$('#form-eliminar').attr('action','sorteo/'+id);
	$('#id-eliminar').val(id);
}		
function formatoHora(hora){

	var previo = '';
	var tipo = ' AM';

	if (hora > 12) {
		hora = hora-12;
		tipo = ' PM';
	}
	if (hora < 10) {
		previo = '0';
	}

	return previo+hora+tipo;
}			
</script>
		
@endsection