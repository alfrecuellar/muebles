<div class="box-body">
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#tab-pane-1" aria-controls="tab-pane-1" role="tab" data-toggle="tab">Datos Generales</a>
    </li>
    <li>
      <a href="#tab-pane-2" aria-controls="tab-pane-2" role="tab" data-toggle="tab">Materiales</a>
    </li>
  </ul>
  <div class="panel panel-default panel-tab">
    <div class="panel-body">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab-pane-1">
          <p><b>Nombre: </b>@{{project.name}}</p>
          <p><b>Cliente: </b>@{{project.client.name}}</p>
          <p><b>Fecha de inicio: </b>@{{project.created}}</p>
        </div>
        <div role="tabpanel" class="tab-pane active" id="tab-pane-2">
          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="box-footer">
  <button class="btn btn-default" data-action="cancel" type="button">Cerrar</button>
</div>
