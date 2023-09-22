<button class="btn btn-primary btn-editar" 
title="Editar" data-toggle="modal" data-target="#modal-primary-editar"
onclick="editar('{{ $id }}') "  >
    <i class="fa fa-edit"></i>
</button>    
<button data-toggle="modal" data-target="#modal-primary-eliminar" class="btn btn-danger" title="Eliminar" onclick="eliminar('{{ $id }}')" ><i class="fa fa-trash"></i> 
</button>