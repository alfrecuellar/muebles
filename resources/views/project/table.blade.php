<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Cliente</th>
      <th>Inicio</th>
      <th width="65">Acción</th>
    </tr>
  </thead>
  <tbody>
    @{{#each projects}}
      <tr>
        <td><a href="javascript:;" data-action="show" data-id="@{{id}}">@{{name}}</a></td>
        <td>@{{client.name}}</td>
        <td>@{{created}}</td>
        <td class="action">
          <a href="javascript:;" data-action="show" data-id="@{{id}}">
            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </a>
          <a href="javascript:;" data-action="edit" data-id="@{{id}}">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </a>
          <a href="javascript:;" data-action="destroy" data-id="@{{id}}" data-name="@{{name}}">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </a>
        </td>
      </tr>
    @{{/each}}
  </tbody>
</table>