@extends('admin.script.eventos.eventosscript')

@section('title', 'Administracion de Eventos')

@section('content')

<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="col-12 ">
            <h1 class="text-center">Gestión de Eventos</h1>
        </div>
        <!-- Botón para abrir modal -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#eventoModal">Agregar Evento</button>

        <!-- Tabla -->
        <table class="table table-striped table-bordered" id="tablaeventos">
            <thead class="thead-dark">
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
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" onclick="cargarDatos({{ $evento->id }})">Editar</button>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="eliminarEvento({{ $evento->id }})">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Crear Evento -->
<div class="modal fade" id="eventoModal" tabindex="-1" aria-labelledby="eventoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      
        <form id="formCrearEvento" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Nombre del evento</label>
                        <input type="text" name="evento" class="form-control" value="{{ old('evento') }}" >
                    </div>
                    <div class="mb-3">
                        <label>Fecha inicial</label>
                        <input type="datetime-local" name="fechainicial" class="form-control" value="{{ old('fechainicial') }}" >
                    </div>
                    <div class="mb-3">
                        <label>Fecha final</label>
                        <input type="datetime-local" name="fechafinal" class="form-control" value="{{ old('fechafinal') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imágenes (máx. 1)</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*">
                    </div>
                    <input type="hidden" name="estado" value="1">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Evento -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formEditar" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
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
                        <label for="imagen" class="form-label">Imágenes (máx. 1)</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*">
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

<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {

    // CREAR evento con AJAX
    $('#formCrearEvento').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('eventos.store') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Evento creado!',
                    text: response.success,
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let mensaje = '';
                    for (let key in errors) {
                        mensaje += errors[key][0] + '     ';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en el formulario',
                        text: mensaje
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al crear el evento.'
                    });
                }
            }
        });
    });

    // Función para cargar datos en el modal editar
    window.cargarDatos = function(id) {
        $.ajax({
            url: '/eventos/' + id + '/edit',
            type: 'GET',
            success: function(data) {
                $('#edit_id').val(data.id);
                $('#edit_evento').val(data.evento);
                $('#edit_fechainicial').val(data.fechainicial.replace(' ', 'T'));
                $('#edit_fechafinal').val(data.fechafinal.replace(' ', 'T'));
                $('#edit_estado').val(data.estado ? '1' : '0');
            },
            error: function() {
                Swal.fire('Error', 'No se pudieron cargar los datos del evento.', 'error');
            }
        });
    };

    // EDITAR evento con AJAX
    $('#formEditar').on('submit', function(e) {
        e.preventDefault();

        var id = $('#edit_id').val();
        var formData = new FormData(this);

        $.ajax({
            url: '/eventos/' + id,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-HTTP-Method-Override': 'PUT' // porque Laravel espera PUT
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Evento actualizado!',
                    text: response.success,
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let mensaje = '';
                    for (let key in errors) {
                        mensaje += errors[key][0] + '\n';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error en el formulario',
                        text: mensaje
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error al actualizar el evento.'
                    });
                }
            }
        });
    });

    // ELIMINAR evento con confirmación
    window.eliminarEvento = function(id) {
        Swal.fire({
            title: '¿Está seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/eventos/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire('Eliminado', response.success, 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo eliminar el evento.', 'error');
                    }
                });
            }
        });
    };

});
</script>

@endsection
