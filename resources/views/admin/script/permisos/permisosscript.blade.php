@extends('admin.plantilla.layout')
@section('scripts')
<script>
    var $link = $('#permisosLink'); // Usa el id del enlace de esta vista

    $link.addClass('active'); // Marca como activo

    var $submenu = $link.closest('ul');
    $submenu.addClass('in'); // Abre el submenu

    var $parentItem = $submenu.closest('.sidebar-item');
    $parentItem.addClass('selected');

    $parentItem.find('.has-arrow').addClass('active').attr('aria-expanded', 'true');
    const table = $('#permissionsTable').DataTable({
        processing: true
        , serverSide: true
        , ajax: "{{ route('permisos.index') }}"
        , columns: [{
                data: 'id'
            }
            , {
                data: 'name'
            }
            , {
                data: 'created_at'
            }
            , {
                data: 'actions'
                , orderable: false
                , searchable: false
            }
        ]
        , language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        }
    });

    // Crear permiso
    $('#formCreate').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Creando...'
            , didOpen: () => Swal.showLoading()
            , allowOutsideClick: false
        });

        $.ajax({
            url: "{{ route('permisos.store') }}"
            , method: "POST"
            , data: $(this).serialize()
            , success: function(response) {
                Swal.fire('Éxito', response.success, 'success');
                $('#formCreate')[0].reset();
                $('#createModal').modal('hide');
                table.ajax.reload();
            }
            , error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let mensaje = '';
                    for (const campo in errors) {
                        mensaje += `<p><strong>${campo}:</strong> ${errors[campo][0]}</p>`;
                    }
                    Swal.fire({
                        title: 'Errores de validación'
                        , html: mensaje
                        , icon: 'error'
                    });
                } else {
                    Swal.fire('Error', 'Error desconocido.', 'error');
                    console.error(xhr.responseText);
                }
            }
        });
    });


    // Mostrar modal de edición
    $('#permissionsTable').on('click', '.editBtn', function() {
        const id = $(this).data('id');
        $.get(`{{ route( 'permisos.show', ':id' ) }}`.replace(':id', id), function(data) {
            $('#edit_id').val(data.id);
            $('#edit_name').val(data.name);
            $('#editModal').modal('show');
        }).fail(function() {
            Swal.fire('Error', 'No se pudo cargar el permiso.', 'error');
        });
    });

    // Actualizar permiso
    $('#formEdit').submit(function(e) {
        e.preventDefault();
        const id = $('#edit_id').val();
        const data = {
            _token: '{{ csrf_token() }}'
            , _method: 'PUT'
            , name: $('#edit_name').val()
        };

        Swal.fire({
            title: 'Actualizando...'
            , didOpen: () => Swal.showLoading()
            , allowOutsideClick: false
        });

        $.ajax({
            url: `{{ route('permisos.update',  ':id') }}`.replace(':id', id)
            , method: 'POST'
            , data: data
            , success: function(response) {
                Swal.fire('Actualizado', response.success, 'success');
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
            , error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let mensaje = '';
                    for (const campo in errors) {
                        mensaje += `<p><strong>${campo}:</strong> ${errors[campo][0]}</p>`;
                    }
                    Swal.fire({
                        title: 'Errores de validación'
                        , html: mensaje
                        , icon: 'error'
                    });
                } else {
                    Swal.fire('Error', 'No se pudo actualizar el permiso.', 'error');
                }
            }
        });
    });

    // Eliminar permiso
    $('#permissionsTable').on('click', '.deleteBtn', function() {
        const id = $(this).data('id');
        Swal.fire({
            title: '¿Estás seguro?'
            , text: "No podrás revertir esto."
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonText: 'Sí, eliminar'
        , }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `{{ route('permisos.destroy', ':id') }}`.replace(':id', id)
                    , type: 'DELETE'
                    , data: {
                        _token: '{{ csrf_token() }}'
                    }
                    , success: function(response) {
                        Swal.fire('Eliminado', response.success, 'success');
                        table.ajax.reload();
                    }
                    , error: function() {
                        Swal.fire('Error', 'No se pudo eliminar el permiso.', 'error');
                    }
                });
            }
        });
    });
</script>
@endsection