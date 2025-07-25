@extends('admin.plantilla.layout')
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#linkEventos').addClass('active');
            let tablaEventos = new DataTable('#tablaeventos', {
                responsive: true
            });
            $('#formEditar').on('submit', function(e) {
                e.preventDefault();

                let id = $(this).data('id');
                let formData = new FormData(this);
                formData.append('_method', 'PUT');

                $.ajax({
                    url: `/admin/eventos/${id}`,
                    type: 'POST',
                    data: formData,
                    processData: false, // necesario para FormData
                    contentType: false, // necesario para FormData
                    success: function(response) {
                        Swal.fire('Actualizado', 'Evento actualizado correctamente.', 'success')
                            .then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                    },
                    error: function(xhr) {
                        let errores = xhr.responseJSON?.errors;
                        let mensaje = 'Ocurrió un error.';

                        if (errores) {
                            mensaje = Object.values(errores).join('<br>');
                        }

                        Swal.fire('Error', mensaje, 'error');
                    }
                });
            });

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
                                mensaje += errors[key][0] + '   .<br>  ';
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error en el formulario',
                                html: mensaje
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
        });

        function eliminarEvento(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/eventos/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: 'DELETE'
                        },
                        success: function(response) {
                            Swal.fire('Eliminado', response.success, 'success').then(() => {
                                location.reload(); // recargar la tabla luego de cerrar alerta
                            });
                        },
                        error: function(xhr) {
                            let mensaje = 'Ocurrió un error al eliminar.';

                            if (xhr.status === 400 && xhr.responseJSON?.error) {
                                mensaje = xhr.responseJSON.error;
                            }

                            Swal.fire('Error', mensaje, 'error');
                        }
                    });
                }
            });
        }

        function cargarDatos(id) {
    fetch(`/admin/eventos/${id}/edit`)
        .then(res => res.json())
        .then(data => {
            $('#edit_evento').val(data.evento);
            $('#edit_fechainicial').val(data.fechainicial.replace(' ', 'T'));
            $('#edit_fechafinal').val(data.fechafinal.replace(' ', 'T'));
            $('#edit_estado').val(data.estado);
            $('#formEditar').data('id', id);
            $('#editModal').modal('show');
        })
        .catch(error => {
            Swal.fire('Error', 'No se pudo cargar la información.', 'error');
            console.error(error);
        });
}
    </script>
@endsection
