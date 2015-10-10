<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Buscar Material</h4>
</div>
<div class="modal-body">
  <div class="form-group">
    <label for="search">Nombre del material</label>
    <div class="clearfix">
      <input type="text" id="search" placeholder="Nombre del material" class="form-control" data-relation="resource" data-action="typeahead" data-typeahead="trigger">
      <input type="hidden" name="resource_id" id="resource_id" data-relation="resource" data-action="typeahead" data-typeahead="target">
    </div>
  </div>
  <div class="well resume_wrapper" style="display:none"></div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-action="cancel" data-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary" data-relation="resource" data-action="edit" style="display:none">Editar</button>
  <button type="button" class="btn btn-primary" data-relation="resource" data-action="submit" disabled="disabled">Aceptar</button>
</div>
