@extends('admin.plantilla.layout')
@section('title', 'Administración de Quiénes Somos')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
@endsection

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!-- Encabezado -->
        <div class="row">
            <div class="col-12 p-3">
                <h1 class="text-center">Información Institucional</h1>
            </div>

            <!-- Botón de Agregar -->
            <div class="col-12 mb-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <i class="ti ti-plus"></i> Nueva Información
                </button>
            </div>

            <!-- Tabla -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center mb-3">
                            <div>
                                <h4 class="card-title">Listado de Información Institucional</h4>
                                <p class="card-subtitle">Gestione los contenidos como Misión, Visión, Valores, etc.</p>
                            </div>
                        </div>

                        <div class="table-responsive mt-4">
                            <table class="table table-striped table-bordered w-100" id="infoTable">
                                <thead>
                                    <tr class="text-center text-muted">
                                        <th>ID</th>
                                        <th>Tipo</th>
                                        <th>Contenido</th>
                                        <th>Foto</th>
                                        <th>Fecha Inicial</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Cargado vía AJAX -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Diseñado y desarrollado por Tu Nombre o Empresa</p>
            </div>
        </div>
    </div>
</div>

<!-- MODAL Crear/Editar -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <form id="infoForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="infoId">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Agregar / Editar Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body row g-3">

                    <div class="col-md-6">
                        <label for="idtipo" class="form-label">Tipo de Información</label>
                        <select name="idtipo" id="idtipo" class="form-select" required>
                            <option value="" disabled selected>Seleccione tipo</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="fechainicial" class="form-label">Fecha Inicial</label>
                        <input type="datetime-local" name="fechainicial" id="fechainicial" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea class="form-control" name="contenido" id="contenido" rows="4" required></textarea>
                    </div>

                    <div class="col-12">
                        <label for="foto" class="form-label">Foto (opcional)</label>
                        <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                        <div class="mt-2" id="fotoPreview"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    let table = $('#infoTable').DataTable({
        ajax: '{{ route("quienessomos.list") }}',
        columns: [
            { data: 'id' },
            { data: 'tipo' },
            { data: 'contenido' },
            { data: 'foto', render: d => d ? `<img src="{{ asset('storage')  }}/${d}" width="50">` : '' },
            { data: 'fechainicial' },
            { data: 'acciones', orderable: false }
        ],
         language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
    });

    $('#btnAdd').click(() => {
        $('#infoId').val('');
        $('#infoForm')[0].reset();
        $('#infoModal').modal('show');
    });

    $('#infoTable').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get(`/admin/quienessomos/edit/${id}`, function(data) {
            $('#infoId').val(data.id);
            $('#idtipo').val(data.idtipo);
            $('#contenido').val(data.contenido);
            $('#infoModal').modal('show');
        });
    });

    $('#infoTable').on('click', '.delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: '¿Está seguro?',
            text: 'Esta acción no se puede revertir.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/quienessomos/delete/${id}`,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: () => {
                        table.ajax.reload();
                        Swal.fire('Eliminado', 'Registro eliminado', 'success');
                    }
                });
            }
        });
    });

    $('#infoForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let id = $('#infoId').val();
        let url = id ? `/admin/quienessomos/update/${id}` : '{{ route("quienessomos.store") }}';

        $.ajax({
            url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: () => {
                $('#infoModal').modal('hide');
                table.ajax.reload();
                Swal.fire('Éxito', 'Registro guardado correctamente', 'success');
            }
        });
    });
});
</script>
@endsection
