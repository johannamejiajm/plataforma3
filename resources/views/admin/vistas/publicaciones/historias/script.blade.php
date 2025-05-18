<script>
    $(document).ready(function() {
        const tabla = $('#tablaPublicacionesHistoria').DataTable({
            ajax: '{{ route("publicaciones.historias") }}',
            columns: [
                { data: 'titulo' },
                { data: 'contenido' },
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
        $('#tablaPublicacionesHistoria').on('click', '.btn-eliminar', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: '¿Quieres Cambiar el Estado Historia?',
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
                        url: `{{ route('historias.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            tabla.ajax.reload();
                            Swal.fire(
                            '¡Actualizado!',
                            `El estado de la Historia fue cambiado a "${response.nuevo_estado}".`,
                            'success'
                            );
                        },
                        error: function() {
                            Swal.fire(
                                'Error',
                                'No se pudo eliminar la publicación de Historia.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });

    $('#formCrearHistoria').submit(function(e) {
    e.preventDefault();

    const form = $(this)[0];

    const formData = new FormData(form);

    Swal.fire({
        title: 'Creando Hstoria...',
        didOpen: () => Swal.showLoading(),
        allowOutsideClick: false
    });

    $.ajax({
        // url: '{{ route('historias.store') }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(res) {
            console.log(res)
            $('#modalCrearHistoria').modal('hide');
            $('#formCrearHistoria')[0].reset();
            $('#tablaPublicacionesHistoria').DataTable().ajax.reload();

            Swal.fire('¡Éxito!', 'La Historia ha sido creada correctamente.', 'success');
        },
        error: function(err) {
            let errores = err.responseJSON.errors;

        // Limpia clases y mensajes anteriores
        $('#formCrearHistoria .form-control, #formCrearHistoria .form-select, #formCrearHistoria textarea').removeClass('is-invalid');
        $('#formCrearHistoria .invalid-feedback').remove();

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


$('#tablaPublicacionesHistoria').on('click', '.btn-editar', function() {
    const id = $(this).data('id');

    $.get(`{{ route('historias.show', ':id') }}`.replace(':id', id), function(data) {

        $('#formEditarHistoria .form-control, #formEditarHistoria .form-select, #formEditarHistoria textarea').removeClass('is-invalid');
        $('#formEditarHistoria .invalid-feedback').remove();

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

        $('#modalEditarHistoria').modal('show');
    });
});

$('#formEditarHistoria').submit(function(e) {
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
        url: `{{ route('historias.update', ':id') }}`.replace(':id', id),
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-HTTP-Method-Override': 'PUT' // Laravel espera PUT para update
        },
        success: function(res) {
            $('#modalEditarHistoria').modal('hide');
            $('#formEditarHistoria')[0].reset();
            $('#tablaPublicacionesHistoria').DataTable().ajax.reload();

            Swal.fire('¡Actualizado!', 'La Historia ha sido modificado correctamente.', 'success');
        },
        error: function(err) {
            let errores = err.responseJSON.errors;

            // Limpia clases y mensajes anteriores
            $('#formEditarHistoria .form-control, #formEditarHistoria .form-select, #formEditarHistoria textarea').removeClass('is-invalid');
            $('#formEditarHistoria .invalid-feedback').remove();

            // Variable para fallback general
            let mensajeGeneral = '';

            // Recorremos los errores para mostrarlos
            for (const campo in errores) {
                const input = $(`#formEditarHistoria [name="${campo}"]`);

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
