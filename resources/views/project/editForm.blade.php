<!-- form start -->
{!! Form::open(array('role' => 'form', 'name' => 'crud_edit_form', 'id' => 'crud_edit_form')) !!}

  <input type="hidden" name="id" id="id" value="@{{project.id}}">
  
  @include('project.form')

  <div class="box-footer">
    <button class="btn btn-primary" type="submit">Guardar</button> 
    <button class="btn btn-default" data-action="cancel" type="button">Cancelar</button>
  </div>

{!! Form::close() !!}