<div class="container mt-5">
        <h2>Editar Evento</h2>

        <form action="{{ route('events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="evento" class="form-label">Evento</label>
                <input type="text" class="form-control" id="evento" name="evento" value="{{ $event->evento }}" required>
            </div>
            <div class="mb-3">
                <label for="fechainicial" class="form-label">Fecha Inicial</label>
                <input type="datetime-local" class="form-control" id="fechainicial" name="fechainicial" value="{{ \Carbon\Carbon::parse($event->fechainicial)->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="mb-3">
                <label for="fechafinal" class="form-label">Fecha Final</label>
                <input type="datetime-local" class="form-control" id="fechafinal" name="fechafinal" value="{{ \Carbon\Carbon::parse($event->fechafinal)->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="1" {{ $event->estado == '1' ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $event->estado == '0' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Evento</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>