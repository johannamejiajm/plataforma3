@extends('admin.plantilla.layout')
@section('scripts')
<script>
    $(document).ready(function() {
        var $link = $('#usuariosLink'); // Usa el id del enlace de esta vista

        $link.addClass('active'); // Marca como activo

        var $submenu = $link.closest('ul');
        $submenu.addClass('in'); // Abre el submenu

        var $parentItem = $submenu.closest('.sidebar-item');
        $parentItem.addClass('selected');

        $parentItem.find('.has-arrow').addClass('active').attr('aria-expanded', 'true');
        let table = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('usuarios.index') }}",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'roles' },
                { data: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });

        // Crear
        $('#formCreate').submit(function(e) {
            e.preventDefault();
            Swal.fire({ title: 'Creando...', didOpen: () => Swal.showLoading() });

            $.post("{{ route('usuarios.store') }}", $(this).serialize())
                .done(function(data) {
                    Swal.fire('¡Éxito!', data.success, 'success');
                    $('#formCreate')[0].reset();
                    $('#createModal').modal('hide');
                    table.ajax.reload();
                })
                .fail(function(xhr) {
                    let msg = Object.values(xhr.responseJSON.errors).map(e => `<p>${e}</p>`).join('');
                    Swal.fire({ title: 'Errores de validación', html: msg, icon: 'error' });
                });
        });

        // Cargar datos para editar
        $(document).on('click', '.editBtn', function() {
            let id = $(this).data('id');
            $.get(`{{ route('usuarios.show', ':id') }}`.replace(':id', id), function(data) {
                $('#editId').val(data.id);
                $('#editName').val(data.name);
                $('#editEmail').val(data.email);
                $('#editRole').val(data.roles[0]?.name);
                $('#editModal').modal('show');
            });
        });

        // Actualizar
        $('#formEdit').submit(function(e) {
            e.preventDefault();
            let id = $('#editId').val();
            Swal.fire({ title: 'Actualizando...', didOpen: () => Swal.showLoading() });

            $.ajax({
                url: `{{ route('usuarios.update', ':id') }}`.replace(':id', id),
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    Swal.fire('¡Éxito!', data.success, 'success');
                    $('#editModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    let msg = Object.values(xhr.responseJSON.errors).map(e => `<p>${e}</p>`).join('');
                    Swal.fire({ title: 'Errores de validación', html: msg, icon: 'error' });
                }
            });
        });

        // Eliminar
        $(document).on('click', '.deleteBtn', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('usuarios.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        data: { _token: "{{ csrf_token() }}" },
                        success: function(data) {
                            Swal.fire('Eliminado', data.success, 'success');
                            table.ajax.reload();
                        },
                        error: function() {
                            Swal.fire('Error', 'No se pudo eliminar el usuario', 'error');
                        }
                    });
                }
            });
        });
    });
    </script>
@endsection