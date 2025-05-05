<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="formEdit">
        @csrf
        @method('PUT')
        <input type="hidden" id="editRoleId" name="id">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Rol</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="editName">Nombre del Rol</label>
              <input type="text" name="name" id="editName" class="form-control" >
            </div>
            <div class="mb-3">
              <label>Permisos</label>
              <div class="row">
                @foreach($permissions as $permission)
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="permissions_edit[]" value="{{ $permission->name }}" id="perm_edit_{{ $permission->id }}" >
                      <label class="form-check-label" for="perm_edit_{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
