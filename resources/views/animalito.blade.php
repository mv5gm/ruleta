@extends('layouts.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><i class="fas fa-dog"></i>Animalitos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">
          	
          	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                  + Nuevo Animalito
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
                  <th>Numero</th>
                  <th>Nombre</th>
                  <th>imagen</th>
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
	      <h4 class="modal-title">Nuevo Animalito</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="{{route('animalito.index')}}" id="form-registrar-animalito" accept-charset="UTF-8" enctype="multipart/form-data" >
	      	@csrf
	      	<div class="input-group mb-3">
		      <input id="nombre" type="text" class="form-control" name="nombre" required="" autocomplete='off' placeholder="Nombre" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-user"></span>
		        </div>
		      </div>
		    </div>

		    <div class="input-group mb-3">
		      <input id="numero" type="text" class="form-control" name="numero" required autocomplete='off' placeholder="Numero" maxlength="10" minlength="1">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="">#</span>
		        </div>
		      </div>
		    </div>

	      	<div class="form-group">
	            <div class="input-group">
	              <div class="custom-file">
	                <input type="file" class="custom-file-input" id="exampleInputFile" placeholder="Imagen" name="imagen">
	                <label class="custom-file-label" for="exampleInputFile">Elige una imagen</label>
	              </div>
	            </div>
	        </div>
                  
	      </form>	
	    	
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      <button type="submit" form='form-registrar-animalito' class="btn btn-primary">Guardar</button>
	    </div>
	  </div>
	  <!-- /.modal-content -->
	</div>	
</div>	

<div class="modal fade" id="modal-primary-editar">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title" id="loader-editar">Editar Animalito</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-editar-animalito" enctype="multipart/form-data" >
	      		
	      	@csrf

	      	@method('put')
	      	<div class="input-group mb-3">
		      <input id="nombre-editar" type="text" class="form-control" name="nombre" required autocomplete='off' placeholder="Nombre" maxlength="100" minlength="3">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-user"></span>
		        </div>
		      </div>
		    </div>

		    <div class="input-group mb-3">
		      <input id="numero-editar" type="text" class="form-control" name="numero" required autocomplete='off' placeholder="Numero" maxlength="10" minlength="1">
		      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="">#</span>
		        </div>
		      </div>
		    </div>

	      	<div class="form-group">
	            <div class="input-group">
	              <div class="custom-file">
	                <input type="file" class="custom-file-input" id="imagen-editar" placeholder="Imagen" name="imagen">
	                <label class="custom-file-label" for="exampleInputFile">Cambia esta imagen</label>
	              </div>
	            </div>
	        </div>            
	      </form>		
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      <button type="submit" form='form-editar-animalito' class="btn btn-primary">Guardar</button>
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
	      <h4 class="modal-title" id="loader-eliminar">Eliminar Animalito</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span></button>
	    </div>
	    <div class="modal-body">
	      	
	      <form method="post" action="" id="form-eliminar-animalito" >
	      		
	      	@csrf

	      	@method('delete')

	      	Esta seguro de eliminar?

	      	<input type="hidden" name="id" id="id-eliminar">      
	      </form>		
	    </div>
	    <div class="modal-footer justify-content-between">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	      <button type="submit" form='form-eliminar-animalito' class="btn btn-danger">Eliminar</button>
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
	$('.btn-editar').on('click',function(){
		alert(this.attr('onclick'));
	});		
});
	
function editar(id){
	
	var url = 'animalito/'+id;
	
	$.ajax(url,{
		beforeSend:function(){
			$('#loader-editar').html(cargando);
		},
		dataType:'json',
		contentType:'application/json',
		cache:false
	}).done(function(response){
		$.each(response,function(index,element){
			$('#nombre-editar').val(element.nombre);
			$('#numero-editar').val(element.numero);
			//$('#imagen-editar').val(element.imagen);
			//$('#imagen-editar-mostrar').attr('src',element.imagen);
			$('#form-editar-animalito').attr('action',url);
		});	
	}).always(function(){
		$('#loader-editar').text('Editar Animalito');
	});	
}	
function eliminar(id){
	$('#form-eliminar-animalito').attr('action','animalito/'+id);
}	
			
tabla = $('#tabla').DataTable({
	"ajax":"{{route('animalito.index')}}",
    serverSide :true,
    "columns":[
        {data:'id'},
        {data:'numero'},
        {data:'nombre'},
        {data:'imagen'},
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

</script>
		
@endsection