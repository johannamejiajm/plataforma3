<script>
    $(document).ready(function () {
        const table = $('#rolesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('roles.list') }}",
            columns: [
                { data: 'name', name: 'name' },
                { data: 'permissions', name: 'permissions', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });

        // Crear
        $('#formCreate').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Creando rol...',
                didOpen: () => Swal.showLoading(),
                allowOutsideClick: false
            });

            $.ajax({
        url: "{{ route('roles.store') }}",
        method: "POST",
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            Swal.fire('¡Éxito!', data.success, 'success');
            $('#createModal').modal('hide');
            $('#formCreate')[0].reset();
             // Limpia clases y mensajes anteriores
             $('#formCreate .form-control, #formCreate .form-check-input').removeClass('is-invalid');
                $('#formCreate .invalid-feedback').remove();
            table.ajax.reload();

        },
        error: function(xhr) {
            if (xhr.status === 422) {
                let errores = xhr.responseJSON.errors;

                // Limpia clases y mensajes anteriores
                $('#formCreate .form-control, #formCreate .form-check-input').removeClass('is-invalid');
                $('#formCreate .invalid-feedback').remove();

                let mensajeGeneral = '';

                for (const campo in errores) {
                    const input = $(`#formCreate [name="${campo}"]`);
                    input.addClass('is-invalid');
                    const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
                    if (input.next('.invalid-feedback').length === 0) {
                        input.after(mensaje);
                    }
                    mensajeGeneral += `<p><strong>${campo}:</strong> ${errores[campo][0]}</p>`;
                }

                Swal.fire({
                    title: 'Errores de validación',
                    html: mensajeGeneral,
                    icon: 'error'
                });
            } else {
                // Otro error (500, 403, etc.)
                Swal.fire({
                    title: 'Error',
                    text: 'Ocurrió un error inesperado.',
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        }
    });
        });

        // Editar
        $(document).on('click', '.editBtn', function() {
            const id = $(this).data('id');
            $.get(`{{ route('roles.edit', ':id') }}`.replace(':id', id), function(data) {


                $('#formEdit .form-control, #formEdit .form-check-input').removeClass('is-invalid');
                $('#formEdit .invalid-feedback').remove();


                $('#editRoleId').val(id).trigger('change');
                $('#editRoleId').attr('value', id);

                $('#editName').val(data.role.name).trigger('change');
                $('#editName').attr('value', data.role.name);




                $('input[name="permissions_edit[]"]').prop('checked', false);
                data.role.permissions.forEach(p => {
                    $(`#perm_edit_${p.id}`).prop('checked', true);
                });
                $('#editModal').modal('show');
            });
        });

        // Guardar edición
        $('#formEdit').submit(function(e) {
        e.preventDefault();

        const form = $(this)[0];
        const formData = new FormData(form);


        const id = $('#editRoleId').val();

        Swal.fire({
            title: 'Actualizando rol...',
            didOpen: () => Swal.showLoading(),
            allowOutsideClick: false
        });

        $.ajax({
            url: `{{ route('roles.update', ':id') }}`.replace(':id', id),
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(res) {
                $('#editModal').modal('hide');
                $('#formEdit')[0].reset();
                $('#rolesTable').DataTable().ajax.reload();

                console.log(res)
                Swal.fire('¡Éxito!', 'El rol ha sido actualizado correctamente.', 'success');
            },
            error: function(err) {
                let errores = err.responseJSON.errors;

                // Limpia clases y mensajes anteriores
                $('#formEdit .form-control, #formEdit .form-check-input').removeClass('is-invalid');
                $('#formEdit .invalid-feedback').remove();

                let mensajeGeneral = '';

                for (const campo in errores) {
                    const input = $(`#formEdit [name="${campo}"]`);
                    input.addClass('is-invalid');
                    const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
                    if (input.next('.invalid-feedback').length === 0) {
                        input.after(mensaje);
                    }
                    mensajeGeneral += `<p><strong>${campo}:</strong> ${errores[campo][0]}</p>`;
                }

                Swal.fire({
                    title: 'Errores de validación',
                    html: mensajeGeneral,
                    icon: 'error'
                });
            }
        });
});

        // Eliminar
        $(document).on('click', '.deleteBtn', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: '¿Eliminar rol?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'Cancelar'
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('roles.destroy', ':id') }}`.replace(':id', id),
                        method: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function(data) {
                            Swal.fire('Eliminado', data.success, 'success');
                            table.ajax.reload();
                        }
                    });
                }
            });
        });

        $('#btnAddPermission').click(function () {
            const name = $('#new_permission').val().trim();
            if (!name) return;

            $.post("{{ route('permissions.store') }}", {
                name: name,
                _token: '{{ csrf_token() }}'
            }, function (res) {
                $('#permFeedback').removeClass('d-none').text(res.success);
                const newCheck = `
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="${res.permission.name}" id="perm_${res.permission.id}" checked>
                        <label class="form-check-label" for="perm_${res.permission.id}">${res.permission.name}</label>
                    </div>
                    </div>`;
                $('#formCreate .row').append(newCheck);
                $('#new_permission').val('');
            }).fail(function (xhr) {
                Swal.fire('Error', xhr.responseJSON.message, 'error');
            });
        });
    });
    </script>
