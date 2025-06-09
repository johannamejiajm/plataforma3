@extends('admin.plantilla.layout')
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#linkInstitucional').addClass('active');
        });

        function actualizarinformacion(id, idtipo) {

            const formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("_method", "PUT");
            formData.append("idtipo", idtipo);
            formData.append("contenido", $(`#contenido-${id}`).val());

            const archivo = $(`#foto-${id}`)[0].files[0];
            if (archivo) {
                formData.append("foto", archivo);
            }

            $.ajax({
                    method: "POST",
                    url: "/admin/quienessomos/" + id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json', // 👈 necesario para poder usar jqXHR.responseJSON
                })
                .done(function(msg) {
                    Swal.fire({
                        title: '¡Actualización exitosa!',
                        text: msg.mensaje,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 422) {
                        // Laravel devuelve errores de validación en responseJSON.errors
                        const errores = jqXHR.responseJSON.errors;
                        let mensajeErrores = '';

                        $.each(errores, function(campo, mensajes) {
                            mensajes.forEach(msg => {
                                mensajeErrores += `• ${msg}<br>`;
                            });
                        });

                        Swal.fire({
                            title: 'Errores de validación',
                            html: mensajeErrores,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    } else {
                        const mensaje = jqXHR.responseJSON?.mensaje || 'Algo salió mal. Intenta nuevamente.';
                        Swal.fire({
                            title: 'Error',
                            text: mensaje,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
        }
    </script>
@endsection
