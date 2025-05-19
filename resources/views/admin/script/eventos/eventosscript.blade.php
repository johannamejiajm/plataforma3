@extends('admin.plantilla.layout')
@section('scripts')
<script>
    $(document).ready(function() {
        let tablaEventos = new DataTable('#tablaeventos', {
            responsive: true
        });
        $('#formEditar').on('submit', function (e) {
            e.preventDefault();

            let id = $(this).data('id'); // obtenemos el ID guardado

            let formData = {
                _token: $('input[name="_token"]').val(),
                _method: 'PUT',
                evento: $('#edit_evento').val(),
                fechainicial: $('#edit_fechainicial').val(),
                fechafinal: $('#edit_fechafinal').val(),
                estado: $('#edit_estado').val(),
            };

            $.ajax({
                url: `/admin/eventos/${id}`,
                type: 'POST', // Laravel interpretará _method: PUT
                data: formData,
                success: function (response) {
                   Swal.fire('Actualizado', 'Evento actualizado correctamente.', 'success')
                    .then((result) => {
                        if (result.isConfirmed) {
                            location.reload(); // solo se ejecuta cuando se hace clic en OK
                        }
                    });
                    // Aquí puedes recargar una tabla o actualizar la vista
                },
                error: function (xhr) {
                    let errores = xhr.responseJSON?.errors;
                    let mensaje = 'Ocurrió un error.';

                    if (errores) {
                        mensaje = Object.values(errores).join('<br>');
                    }

                    Swal.fire('Error', mensaje, 'error');
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
                    success: function (response) {
                        Swal.fire('Eliminado', response.success, 'success').then(() => {
                            location.reload(); // recargar la tabla luego de cerrar alerta
                        });
                    },
                    error: function (xhr) {
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
                $('#formEditar').data('id', id); // Guardamos el ID en el form
                $('#editModal').modal('show');
            })
            .catch(error => {
                Swal.fire('Error', 'No se pudo cargar la información.', 'error');
                console.error(error);
            });
    }

</script>
@endsection

