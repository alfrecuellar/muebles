<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name="name" placeholder="Nombre" id="name" class="form-control" value="@{{resource.name}}" required>
</div>
<div class="form-group">
  <label for="price">Precio</label>
  <div class="input-group">
    <span class="input-group-addon">$</span>
    <input type="number" step="0.01" name="price" placeholder="Precio" id="price" class="form-control" value="@{{resource.price}}" required>
  </div>
</div>
