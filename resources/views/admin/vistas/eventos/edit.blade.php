<div class="container mt-5">
    <h2>Editar Evento</h2>

    <form id="formEditar" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="edit_evento" class="form-label">Evento</label>
            <input type="text" class="form-control" id="edit_evento" name="evento" required>
        </div>

        <div class="mb-3">
            <label for="edit_fechainicial" class="form-label">Fecha Inicial</label>
            <input type="datetime-local" class="form-control" id="edit_fechainicial" name="fechainicial" required>
        </div>

        <div class="mb-3">
            <label for="edit_fechafinal" class="form-label">Fecha Final</label>
            <input type="datetime-local" class="form-control" id="edit_fechafinal" name="fechafinal" required>
        </div>

        <div class="mb-3">
            <label for="edit_estado" class="form-label">Estado</label>
            <select class="form-select" id="edit_estado" name="estado" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="edit_imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="edit_imagen" name="imagen" accept="image/*">
            <small class="form-text text-muted">Si no seleccionas una imagen nueva, se conservará la anterior.</small>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Evento</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
