<script>
    $(document).ready(function() {
       var $link = $('#eventoPublicacionesLink'); // Usa el id del enlace de esta vista

        $link.addClass('active'); // Marca como activo

        var $submenu = $link.closest('ul');
        $submenu.addClass('in'); // Abre el submenu

        var $parentItem = $submenu.closest('.sidebar-item');
        $parentItem.addClass('selected');

        $parentItem.find('.has-arrow').addClass('active').attr('aria-expanded', 'true');
        const tabla = $('#tablaPublicaciones').DataTable({
            ajax: '{{ route("publicaciones.eventos") }}',
            columns: [
                { data: 'titulo' },
                { 
                    data: 'contenido',
                    render: function(data) {
                        if (data.length > 50) {
                            return data.substring(0, 50) + '...';
                        }
                        return data;
                    }
                },
                { data: 'fecha_inicial' },
                { data: 'fecha_final' },
                {
                    data: 'estado',
                    render: function(data) {
                        let clase = data === 'Activo' ? 'bg-success' : 'bg-danger';
                        return `<span class="badge ${clase}">${data}</span>`;
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    render: function(data) {


                        return `
                            <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-sm btn-warning text-white btn-editar" data-id="${data}">
                                    <i class="ti ti-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-danger btn-eliminar" data-id="${data}">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });

        // Evento con SweetAlert2
        $('#tablaPublicaciones').on('click', '.btn-eliminar', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: '¿Quieres Cambiar el Estado?',
                text: "Esta acción cambiara para que no se muestre.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, Cambialo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('admin.publicaciones.eventos.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            tabla.ajax.reload();
                            Swal.fire(
                            '¡Actualizado!',
                            `El estado fue cambiado a "${response.nuevo_estado}".`,
                            'success'
                            );
                        },
                        error: function() {
                            Swal.fire(
                                'Error',
                                'No se pudo eliminar la publicación.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });

    $('#formCrearEvento').submit(function(e) {
        e.preventDefault();

        const form = $(this)[0];

        const formData = new FormData(form);

        Swal.fire({
            title: 'Creando evento...',
            didOpen: () => Swal.showLoading(),
            allowOutsideClick: false
        });

        $.ajax({
            url: '{{ route("admin.publicaciones.eventos.store") }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function(res) {
            console.log(res)
            $('#modalCrearEvento').modal('hide');
            $('#formCrearEvento')[0].reset();
            $('#tablaPublicaciones').DataTable().ajax.reload();

            Swal.fire('¡Éxito!', 'El evento ha sido creado correctamente.', 'success');
        },
        error: function(err) {
            let errores = err.responseJSON.errors;

            // Limpia clases y mensajes anteriores
            $('#formCrearEvento .form-control, #formCrearEvento .form-select, #formCrearEvento textarea').removeClass('is-invalid');
            $('#formCrearEvento .invalid-feedback').remove();

            // Variable para fallback general
            let mensajeGeneral = '';

            // Recorremos los errores para mostrarlos
            for (const campo in errores) {
            const input = $(`[name="${campo}"]`);

            // Agregamos clase de error
            input.addClass('is-invalid');

            // Mostramos mensaje debajo del input
            if (input.length > 0) {
            const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
            input.after(mensaje);
            }

            // También acumulamos para el mensaje general (por si quieres mostrar en SweetAlert2 también)
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

$('#tablaPublicaciones').on('click', '.btn-editar', function() {
    const id = $(this).data('id');

    $.get(`{{ route('admin.publicaciones.eventos.show', ':id') }}`.replace(':id', id), function(data) {

        $('#formEditarEvento .form-control, #formEditarEvento .form-select, #formEditarEvento textarea').removeClass('is-invalid');
        $('#formEditarEvento .invalid-feedback').remove();

        $('#editar_id').val(data.id).trigger('change');
        $('#editar_id').attr('value', data.id);

        $('#editar_titulo').val(data.titulo).trigger('change');
        $('#editar_titulo').attr('value', data.titulo);

        $('#editar_contenido').val(data.contenido).trigger('change');
        $('#editar_contenido').attr('value', data.contenido);

        $('#editar_fechainicial').val(data.fechainicial).trigger('change');
        $('#editar_fechainicial').attr('value', data.fechainicial);

        $('#editar_fechafinal').val(data.fechafinal).trigger('change');
        $('#editar_fechafinal').attr('value', data.fechafinal);

        $('#editar_estado').val(data.estado).trigger('change');
        $('#editar_estado').attr('value', data.estado);

        // Limpiar y mostrar imágenes actuales
        const contenedor = $('#imagenes_actuales');
        contenedor.empty();
        data.imagenes.forEach(img => {
            contenedor.append(`
                <div class="position-relative">
                    <img src="/${img.ruta}" class="img-thumbnail" style="width: 100px; height: 100px;">
                </div>
            `);
        });

        $('#modalEditarEvento').modal('show');
    });
});

$('#formEditarEvento').submit(function(e) {
    e.preventDefault();

    const id = $('#editar_id').val();
    const form = $(this)[0];
    const formData = new FormData(form);

    Swal.fire({
        title: 'Actualizando evento...',
        didOpen: () => Swal.showLoading(),
        allowOutsideClick: false
    });

    $.ajax({
         url: `{{ route('admin.publicaciones.eventos.update', ':id') }}`.replace(':id', id),
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-HTTP-Method-Override': 'PUT' // Laravel espera PUT para update
        },
        success: function(res) {
            $('#modalEditarEvento').modal('hide');
            $('#formEditarEvento')[0].reset();
            $('#tablaPublicaciones').DataTable().ajax.reload();

            Swal.fire('¡Actualizado!', 'El evento ha sido modificado correctamente.', 'success');
        },
        error: function(err) {
            let errores = err.responseJSON.errors;

            // Limpia clases y mensajes anteriores
            $('#formEditarEvento .form-control, #formEditarEvento .form-select, #formEditarEvento textarea').removeClass('is-invalid');
            $('#formEditarEvento .invalid-feedback').remove();

            // Variable para fallback general
            let mensajeGeneral = '';

            // Recorremos los errores para mostrarlos
            for (const campo in errores) {
                const input = $(`#formEditarEvento [name="${campo}"]`);

                input.addClass('is-invalid');

                if (input.length > 0) {
                    const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
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

</script>
