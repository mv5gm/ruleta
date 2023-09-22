@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fas fa-money-bill-wave"></i> Contabilidad</h1>
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
                + Nueva Consulta
            </button>
          </li>
        </ol>
      </div>
   </div>
   	<div class="card">
		<div class="card-header">
			<h3>Totales</h3>
		</div>
		<div class="card-body">
			<p>Total Jugado: {{$total->jugado}} Bs</p>
	      	<p>Total Ganado: {{$total->ganado}} Bs</p>
	      	<p>Total Balance: {{$total->balance}} Bs</p>	
		</div>
   	</div>
   <!-- /.container-fluid -->
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
                  <th>Dia</th>
                  <th>Jugado Bs</th>
                  <th>Ganado Bs</th>
                  <th>Balance Bs</th>
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
	      <h4 class="modal-title" id="loader-registrar">Nueva Consulta</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="{{route('contabilidad.index')}}" id="form-registrar"  >
	      	@csrf
	      	<div class="input-group">
	      	<label>Rango de fechas:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                  </span>
                </div>
                <input type="text" class="form-control float-right" id="fechas" name="fechas">
              </div>
           </div>
	      </form>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-registro" >Cancelar</button>
	      <button type="submit" form='form-registrar' class="btn btn-primary">Guardar</button>
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>	
</div>	

<div class="modal fade" id="modal-primary-editar">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-editar">Ver Contabilidad</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	<div id="ver-contabilidad"></div>
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-editar" >Ok</button>
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>
<!-- /.modal-dialog -->
</div>
<button type="button" data-target='#modal-primary-consulta' data-toggle='modal' style="display: none" id="abrir-ventana-consulta-resultado" >
	
</button>
<div class="modal fade" id="modal-primary-consulta">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-consultar">Resultado de la consulta</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar-ventana-resultado-consulta">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	<div id="ver-resultados"></div>
	      	<div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabla-resultado" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Dia</th>
                  <th>Jugado Bs</th>
                  <th>Ganado Bs</th>
                  <th>Balance Bs</th>
                  <th>Opcion</th>
                </tr>
                </thead>
                <tbody id="tbody-resultado">
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
           </div>
           
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-cancelar-editar" >Ok</button>
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

function formatoFecha(fecha,formato){
	const map = {
		dd : fecha.getDate(),
		mm : fecha.getMonth()+1,
		yy : fecha.getFullYear().toString().slice(-2),
		yyyy : fecha.getFullYear()
	}
	return formato.replace(/dd|mm|yy|yyy/gi,matched=>map[matched]);
}	

function fechaActual(){
	var hoy = new Date(Date.now());
	hoy = hoy.toLocaleDateString();
	alert(formatoFecha(new Date(),'yyyy-mm-dd'));

}	
//fechaActual();

$(document).ready(function(){
	
	cargar();
	//Date range picker
    $('#fechas').daterangepicker({
    	'locale':{
    		'format':'YYYY-MM-DD',
    		'separator':' / ',
    		'applyLabel':'Guardar',
    		'cancelLabel':'Cancelar',
    		'fromLabel':'Desde',
    		'toLabel':'Hasta',
    		'customRangeLabel':'Personalizar',
    		'daysOfWeek':["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    		'mounthNames':["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    		'firstDay':1
    	},
    	'startDate':'2023-08-01',
    	'opens':'center'
    });
    
});			
$('#form-registrar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = 'contabilidad/';
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
			$('#loader-consultar').html(cargando);
		},
		data:form,
		type:'post'
	}).done(function(response){
			
		console.log(response);

		var html = '';

		$.each(response,function(index,element){
		
			var sig = "'";

			html += '<tr>';
			html += '<td>'+element.dia+'</td>';
			html += '<td>'+element.jugado+'</td>';
			html += '<td>'+element.ganado+'</td>';
			html += '<td>'+element.balance+'</td>';
			html += '<td><button class="btn btn-primary btn-editar" title="Ver" data-toggle="modal" data-target="#modal-primary-editar"onclick="ver('+sig+element.dia+sig+')"  ><i class="fa fa-eye"></i></button></td>';
			html += '</tr>';
		});	

		$('#tbody-resultado').html(html);


		$('#abrir-ventana-consulta-resultado').click();
		$('#btn-cancelar-registro').click();
			
	}).always(function(){
		$('#loader-registrar').text('Nueva Loteria');
		$('#loader-consultar').html('Resultado');
	});	
});		
		

function ver(dia){
	
	$('#cerrar-ventana-resultado-consulta').click();

	$('#ver-contabilidad').html('');

	var url = '/contabilidad/'+dia;
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){
		
		//console.log(response);

		var banca = 0;
		var ticket = 0;
		var html = '';

		$.each(response,function(index,element){

			var cerrado = '';

			if(banca != element.banca_id){

				html+='<h5>Banca:'+element.banca+'</h5>';
			}
			if(ticket != element.ticket_id){
				
				if (index > 0) {
					//cerrado ='</div></div>';
				}

				//html+='<div class="card"><div class="card-header">Ticket:'+element.ticket_id+'</div><div class="card-body">';
				html+='<p>Ticket:'+element.ticket_id+'</p>';
			}	
			
			var ganado = 0;
				
			if (element.ganador == 1) {
				ganado = element.monto * 30;
			}	

			html+='<div class="row alert alert-info"><div class="col-sm-1"><img width="50" height="50" src="/img/animalitos/'+element.imagen+'"></div><div class="col-sm-9">Animalito: '+element.animalito+'  Sorteo:'+element.hora+'  Loteria:'+element.loteria+' Monto:'+element.monto+' Bs  Ganado:'+ganado+' Bs </div></div>';

			html += cerrado;

			banca = element.banca_id;
			ticket = element.ticket_id;
				
		});	

		$('#ver-contabilidad').html(html);

		$('#form-editar').attr('action',url);

	}).always(function(){
		$('#loader-editar').text('Ver Contabilidad');
	});	
}	
function eliminar(id){
	$('#form-eliminar').attr('action','banca/'+id);
}	
			
function cargar(){
	
	tabla = $('#tabla').DataTable({
		"ajax":"{{route('contabilidad.index')}}",
	    serverSide :true,
	    "columns":[
	        {data:'dia'},
	        {data:'jugado'},
	        {data:'ganado'},
	        {data:'balance'},
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
$('#btn-recargar').on('click',function(){
	recargar();
});

function recargar(){
	tabla.destroy();
    cargar();
}

</script>
		
@endsection