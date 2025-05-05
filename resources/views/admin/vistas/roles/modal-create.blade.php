<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="formCreate">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Crear Rol</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="name">Nombre del Rol</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
              <label>Permisos</label>
              <div class="row">
                @foreach($permissions as $permission)
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                      <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="mb-3">
              <label for="new_permission">Crear Permiso nuevo:</label>
              <div class="input-group">
                <input type="text" id="new_permission" class="form-control" placeholder="Nombre del permiso">
                <button type="button" class="btn btn-secondary" id="btnAddPermission">Agregar</button>
              </div>
            </div>
            <div id="permFeedback" class="text-success mt-2 d-none"></div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
