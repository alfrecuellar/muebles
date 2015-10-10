<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Actualizado</th>
      <th width="65">Acción</th>
    </tr>
  </thead>
  <tbody>
    @{{#each resources}}
      <tr>
        <td><a href="javascript:;" data-action="show" data-id="@{{id}}">@{{name}}</a></td>
        <td align="right">$ @{{price}}</td>
        <td align="right">@{{updated}}</td>
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