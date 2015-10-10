<!-- form start -->
{!! Form::open(array('role' => 'form')) !!}
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Editar Cliente</h4>
  </div>
  <div class="modal-body">
    <div class="form_wrapper">
      @include('client.form')
    </div>
    <div class="resume_wrapper"></div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-action="cancel" data-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-primary" data-relation="client" data-action="edit" data-id="@{{client.id}}" style="display:none">Editar</button>
    <button type="button" class="btn btn-primary" data-relation="client" data-action="submit" style="display:none">Aceptar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
{!! Form::close() !!}