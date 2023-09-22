<button class="btn btn-primary btn-editar" 
title="Ver" data-toggle="modal" data-target="#modal-primary-editar"
onclick="ver('{{ $id }}') "  >
    <i class="fa fa-eye"></i>
</button>    

<button class="btn btn-primary btn-editar" 
title="Imprimir" 
onclick="imprimir('{{ $id }}') "  >
    <i class="fa fa-print"></i>
</button>    

<button data-toggle="modal" data-target="#modal-primary-eliminar" class="btn btn-danger" title="Eliminar" onclick="eliminar('{{ $id }}')" ><i class="fa fa-trash"></i> 
</button>