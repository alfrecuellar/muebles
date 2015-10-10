<!-- form start -->
{!! Form::open(array('role' => 'form', 'name' => 'crud_add_form', 'id' => 'crud_add_form')) !!}

  <div class="box-body">
    <ul class="nav nav-tabs" role="tablist">
      <li class="active">
        <a href="#tab-pane-1" aria-controls="tab-pane-1" role="tab" data-toggle="tab">Datos del Material</a>
      </li>
    </ul>
    <div class="panel panel-default panel-tab">
      <div class="panel-body">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="tab-pane-1">
            @include('resource.form')
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button class="btn btn-primary" type="submit">Guardar</button> 
    <button class="btn btn-default" data-action="cancel" type="button">Cancelar</button>
  </div>

{!! Form::close() !!}