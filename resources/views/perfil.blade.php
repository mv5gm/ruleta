@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> <i class="fas fa-user fa-edit"></i> Perfil</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">

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
            	<div class="card-header">
            		<h4>Datos Personales</h4>
            	</div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-striped">
                
                <tbody id="tbody">
                	
                </tbody>
              </table>
            </div>
            <div class="card-footer">
	      		<p id="loader-datos"></p>
	      		<button data-toggle='modal' data-target='#modal-primary-editar' class="btn btn-primary" id="btn-cambiar">Cambiar</button>	
            </div>
            <!-- /.card-body -->
          </div>	
         	<div class="card">
         		<div class="card-header">
         			<h4>Cambiar Contraseña</h4>
         		</div>
         		<div class="card-footer">
         			<p id="loader-password"></p>
	      			<button data-toggle='modal' data-target='#modal-primary' class="btn btn-primary" id="btn-cambiar">Cambiar</button>	
         		</div>	
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
	      <h4 class="modal-title" id="loader-registrar">Cambiar Contraseña</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="{{route('perfil.index')}}" id="form-registrar" enctype="multipart/form-data" >
	      	@csrf
	      	<div class="input-group mb-3">
		      <input id="password" type="password" class="form-control" name="password" required="" autocomplete='off' placeholder="Contraseña Actual" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-clock"></span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="new-password" type="password" class="form-control" name="new_password" required="" autocomplete='off' placeholder="Nueva Contraseña" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="">#</span>
		        </div>
		      </div>
		    </div>
		    <div class="input-group mb-3">
		      <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirm" required="" autocomplete='off' placeholder="Repita la Nueva Contraseña" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="">#</span>
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
	      <h4 class="modal-title" id="loader-editar">Editar Datos</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-editar" >
	      		
	      	@csrf

	      	@method('put')
	      	<label>Nombre</label>
	      	<div class="input-group mb-3">
		      <input id="name-editar" type="text" class="form-control" name="name" required autocomplete='off' placeholder="Nombre" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-user"></span>
		        </div>
		      </div>
		    </div>
		    <label>Correo</label>
	      	<div class="input-group mb-3">
		      <input id="email-editar" type="text" class="form-control" name="email" required autocomplete='off' placeholder="Nombre" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-user"></span>
		        </div>
		      </div>
		    </div>
		    <input type="hidden" name="banca_id" id="banca-id-editar">
		    <label>Limite</label>
		    <div class="input-group mb-3">
		      <input id="limite-editar" type="number" class="form-control" name="limite" required autocomplete='off' placeholder="Limite" min='1' max='1000000' step='1'>
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="">#</span>
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
	      <h4 class="modal-title" id="loader-eliminar">Eliminar Banca</h4>
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

	$('#btn-cambiar').hide();
	
	$('.btn-editar').on('click',function(){
		alert(this.attr('onclick'));
	});	

	cargar();		
});			
$('#form-registrar').submit(function(e){
			
	e.preventDefault();
		
	var form = $(this).serialize();

	var url = 'perfil/';
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-registrar').html(cargando);
		},
		data:form,
		type:'post'
	}).done(function(response){
			
		//console.log(response);

		if (response.estado == 'info') {
			toastr.info(response.mensaje);
		}	
		else{
			toastr.error(response.mensaje);
		}	

		recargar();
				
		$('#btn-cancelar-registro').click();
			
	}).always(function(){
		$('#loader-registrar').text('Nueva Loteria');
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
		$('#loader-editar').text('Editar Datos');
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
		$('#loader-eliminar').text('Eliminar Datos');
	});
});
	
function eliminar(id){
	$('#form-eliminar').attr('action','banca/'+id);
}	
			
function cargar(){
	
	var url = 'perfil/';
	var html = '';

	$.ajax(url,{
		beforeSend:function(){
			$('#loader-datos').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){
			
		html+='<tr>';
        html+='<td>Nombre</td>';
        html+='<td>'+response[0].name+'</td>';
        html+='</tr>';
        html+='<tr>';
        html+='<td>Correo</td>';
        html+='<td>'+response[0].email+'</td>';
        html+='</tr>';
        html+='<td>Limite Banca</td>';
        html+='<td>'+response[0].bancas[0].limite+' Bs</td>';
        html+='</tr>';

		$('#tbody').html(html);	
		
		$('#name-editar').val(response[0].name);
		$('#email-editar').val(response[0].email);
		$('#banca-id-editar').val(response[0].bancas[0].id);
		$('#limite-editar').val(response[0].bancas[0].limite);
		$('#form-editar').attr('action',url+response[0].id);
		$('#btn-cambiar').show();

	}).always(function(){
		$('#loader-datos').html('');
	});
}

function recargar(){
	
    cargar();
}

</script>
		
@endsection