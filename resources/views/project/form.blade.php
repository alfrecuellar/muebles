<div class="box-body">
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#tab-pane-1" aria-controls="tab-pane-1" role="tab" data-toggle="tab">Datos Generales</a>
    </li>
  </ul>
  <div class="panel panel-default panel-tab">
    <div class="panel-body">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab-pane-1">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Nombre del proyecto" class="form-control" value="@{{project.name}}" required>
          </div>
          <div class="form-group">
            <label for="description">Nombre</label>
            <textarea name="description" id="description" placeholder="Descripción del proyecto" class="form-control" rows="5">@{{project.description}}</textarea>
          </div>
          <div class="form-group">
            <label for="client_name">Cliente</label>
            <div class="input-group">
              <input type="text" data-relation="client" data-target="text" class="form-control" placeholder="Buscar Cliente" value="@{{project.client.name}}" readonly="readonly">
              <input type="hidden" name="client_id" id="client_id" data-relation="client" data-target="id" value="@{{project.client.id}}">
              <span class="input-group-btn">
                <span class="btn btn-default" data-relation="client" data-action="search" data-id="@{{project.client.id}}">Buscar</span>
                <span class="btn btn-default" data-relation="client" data-action="add" data-id="@{{project.client.id}}">Nuevo</span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>