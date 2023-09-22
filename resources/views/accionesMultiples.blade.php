<div class="icheck-primary d-inline">
    <input type="checkbox" class="delete_check" id="delcheck_{{ $id }}" onclick='checkcheckbox();' value='{{ $id }}' >
    <label for="delcheck_{{ $id }}">
    </label>
 </div>

<button class="btn btn-primary btn-editar" 
title="Ver Resultados" data-toggle="modal" data-target="#modal-primary-editar"
onclick="editar('{{ $id }}') "  >
    <i class="fa fa-edit"></i>
</button> 
