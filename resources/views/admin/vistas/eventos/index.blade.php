@extends('admin.plantilla.layout')

@section('title', 'Administracion de Eventos')

@section('content')

<body>
<div class="container mt-4">
    <h2>Eventos</h2>

    <!-- Botón para abrir modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#eventoModal">Agregar Evento</button>

    <!-- Modal -->
    <div class="modal fade" id="eventoModal" tabindex="-1" aria-labelledby="eventoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="POST" action="{{ route('eventos.store') }}">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar Evento</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label>Nombre del evento</label>
                <input type="text" name="evento" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Fecha inicial</label>
                <input type="datetime-local" name="fechainicial" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Fecha final</label>
                <input type="datetime-local" name="fechafinal" class="form-control" required>
              </div>
              <div class="mb-3">
                <label>Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Tabla -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->evento }}</td>
                    <td>{{ $evento->fechainicial }}</td>
                    <td>{{ $evento->fechafinal }}</td>
                    <td>
                        <span class="badge bg-{{ $evento->estado == '1' ? 'success' : 'secondary' }}">
                            {{ $evento->estado == '1' ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                    <td>
    <!-- Botón Editar -->
    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"
        onclick="cargarDatos({{ $evento->id }})">Editar</button>

    <!-- Formulario Eliminar -->
    <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
    </form>
</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formEditar" method="POST">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Nombre del evento</label>
            <input type="text" name="evento" id="edit_evento" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Fecha inicial</label>
            <input type="datetime-local" name="fechainicial" id="edit_fechainicial" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Fecha final</label>
            <input type="datetime-local" name="fechafinal" id="edit_fechafinal" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Estado</label>
            <select name="estado" id="edit_estado" class="form-select" required>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
    function cargarDatos(id) {
        fetch(`/eventos/${id}/edit`)
            .then(res => res.json())
            .then(data => {
                document.getElementById('edit_evento').value = data.evento;
                document.getElementById('edit_fechainicial').value = data.fechainicial.replace(' ', 'T');
                document.getElementById('edit_fechafinal').value = data.fechafinal.replace(' ', 'T');
                document.getElementById('edit_estado').value = data.estado;

                // Configura la acción del formulario
                document.getElementById('formEditar').action = `/eventos/${id}`;
            });
    }
</script>

</body>
@endsection