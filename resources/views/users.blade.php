@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fas fa-user"></i> Usuarios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">
          	
          	<a  href='register' type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  + Nuevo Usuario
            </a>

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
                  <th>Nombre</th>
                  <th>Correo</th>
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
	<div class="modal-dialog">
	  <div class="modal-content ">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-registrar">Nuevo Usuario</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="{{route('user.index')}}" id="form-registrar" >
	      	@csrf
	      	<div class="input-group mb-3">
		      <input id="nombre" type="text" class="form-control" name="name" required="" autocomplete='off' placeholder="Nombre" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-user"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="correo" type="email" class="form-control" name="email" required="" autocomplete='off' placeholder="Correo" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-mail"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="password" type="password" class="form-control" name="password" required="" autocomplete='off' placeholder="Contraseña" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-lock"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete='off' placeholder="Confirmar Contraseña" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-lock"></span>
		        </div>
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
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-editar">Editar Usuario</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-editar" >
	      		
	      	@csrf

	      	@method('put')

	      	<div class="input-group mb-3">
		      <input id="name-editar" type="text" class="form-control" name="name" required autocomplete='off' placeholder="Nombre" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-user"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="email-editar" type="email" class="form-control" name="email" required="" autocomplete='off' placeholder="Correo" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-email"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="password-editar" type="password" class="form-control" name="password" required="" autocomplete='off' placeholder="Contraseña" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-lock"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="password-confirm-editar" type="password" class="form-control" name="password_confirmation" required="" autocomplete='off' placeholder="Contraseña" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-lock"></span>
		        </div>
		      </div>
		    </div> 
		    <div class="col-12" id="roles">
		    	
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
	      <h4 class="modal-title" id="loader-eliminar">Eliminar User</h4>
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

$(document).ready(function(){
	
	cargar();

	var url = 'roles/';
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
		},
		type:'get'
	}).done(function(response){	

		var html = '';	
		
		$.each(response,function(index,element){
			console.log(index);
			console.log(element);
			html += '<label> '+element.name+' <input type="checkbox" name="role" value="'+element.id+'" ></label>';	

		});

		$('#roles').html(html);
					
	}).always(function(){
		$('#loader-registrar').text('Nuevo Usuario');
	});

});	

$('#form-registrar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = 'user/';
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
		},
		data:form,
		type:'post'
	}).done(function(response){	
		
		toastr.info(response);

		if (response.estado == 'info') {
			toastr.info(response.mensaje);
		}	
		else{
			toastr.error(response.mensaje);
		}	

		recargar();
				
		$('#btn-cancelar-registro').click();
			
	}).always(function(){
		$('#loader-registrar').text('Nuevo Usuario');
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
		$('#loader-editar').text('Editar Usuario');
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
		$('#loader-eliminar').text('Eliminar Loteria');
	});
});
	
function editar(id){
	
	var url = 'user/'+id;
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){
		$.each(response,function(index,element){
				
			$('#'+index+'-editar').val(element);		
		});	

		$('#form-editar').attr('action',url);

	}).always(function(){
		$('#loader-editar').text('Editar Usuario');
	});	
}		
function eliminar(id){
	$('#form-eliminar').attr('action','user/'+id);
}	
			
function cargar(){
	
	tabla = $('#tabla').DataTable({
		"ajax":"{{route('user.index')}}",
	    serverSide :true,
	    "columns":[
	        {data:'id'},
	        {data:'name'},
	        {data:'email'},
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

</script>
		
@endsection