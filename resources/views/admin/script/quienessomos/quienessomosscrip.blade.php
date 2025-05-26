@extends('admin.plantilla.layout')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    $('#linkInstitucional').addClass('active');
    let table = $('#infoTable').DataTable({
        ajax: '{{ route("quienessomos.list") }}',
        columns: [
            { data: 'id' },
            { data: 'tipo' },
            { data: 'contenido' },
            { data: 'foto', render: d => d ? `<img src="{{ asset('storage')  }}/${d}" width="50">` : '' },
            { data: 'fechainicial' },
             {
                    data: 'estado',
                    render: function(data) {
                        let clase = data === 1 ? 'bg-success' : 'bg-danger';
                        return `<span class="badge ${clase}">${data ? 'Activo' : 'Inactivo'}</span>`;
                    }
                },
            { data: 'acciones', orderable: false }
        ],
         language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
    });

    $('#btnAdd').click(() => {
       $('#infoIdAdd').val('');
        $('#idtipoAdd').val('');
        $('#contenidoAdd').val('');
        $('#fechainicialAdd').val('');
        $('#crearInfoForm')[0].reset();
        $('#addModal').modal('show');
    });

    $('#infoTable').on('click', '.edit', function() {
        let id = $(this).data('id');
        $('#editarInfoForm')[0].reset();
        $.get(`/admin/quienessomos/edit/${id}`, function(data) {
            $('#infoId').val(data.id).trigger('change');
            $('#infoId').attr('value', data.id);
            $('#idtipo').val(data.idtipo).trigger('change');
            $('#contenido').val(data.contenido).trigger('change');
             $('#fechainicial').val(data.fechainicial).trigger('change');
                if (data.foto) {
                    let url = `{{ asset('storage') }}/${data.foto}`;
                    $('#detalleFoto').html(`<img src="${url}" alt="Imagen" width="300" class="img-fluid border">`);
                } else {
                    $('#detalleFoto').html('<em>No hay imagen</em>');
                }
            $('#estado').val(data.estado).trigger('change');
            $('#editarModal').modal('show');
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
        $('#crearInfoForm').submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: '{{ route("quienessomos.store") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: () => {
            $('#addModal').modal('hide');
            table.ajax.reload();
            Swal.fire('Éxito', 'Registro Actualizado correctamente', 'success');
        },
        error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (const [key, value] of Object.entries(errors)) {
                    errorMessages += `<p>${value.join(', ')}</p>`;
                }
                Swal.fire({
                    icon: 'error',
                    title: '¡Oops!',
                    html: errorMessages,
                    confirmButtonText: 'Aceptar'
                });
            }
    });
});
    $('#editarInfoForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        let id = $('#infoId').val();
        let url = `/admin/quienessomos/update/${id}`;

        $.ajax({
            url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: () => {
                $('#editarModal').modal('hide');
                table.ajax.reload();
                  Swal.fire('Éxito', 'Registro Actualizado correctamente', 'success');
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (const [key, value] of Object.entries(errors)) {
                    errorMessages += `<p>${value.join(', ')}</p>`;
                }
                Swal.fire({
                    icon: 'error',
                    title: '¡Oops!',
                    html: errorMessages,
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    });
});
</script>
@endsection
