@extends('admin.plantilla.layout')
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
        $('#infoId').val('').trigger('change');
        $('#idtipo').val('').trigger('change');
        $('#contenido').val('').trigger('change');
        $('#infoForm')[0].reset();
        $('#infoModal').modal('show');
    });

    $('#infoTable').on('click', '.edit', function() {
        let id = $(this).data('id');
        $.get(`/admin/quienessomos/edit/${id}`, function(data) {
            $('#infoId').val(data.id).trigger('change');
            $('#idtipo').val(data.idtipo).trigger('change');
            $('#contenido').val(data.contenido).trigger('change');
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
