@extends('admin.plantilla.layout')
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#linkContactos').addClass('active');
            $("#guardarcontactos").on('click', function(e) {
                e.preventDefault();
                var direccion = $("#direccion").val();
                var telefono1 = $("#telefono1").val();
                var telefono2 = $("#telefono2").val();
                var email = $("#email").val();
                var horario = $("#horarios").val();
                var horarioextras = $("#horarioextras").val();
                var embebido = $("#embebido").val();
                var urlfacebook = $("#urlfacebook").val();
                var urlx = $("#urlx").val();
                var urlinstagram = $("#urlinstagram").val();
                $.ajax({
                        method: "POST",
                        url: "/admin/contactos",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            direccion,
                            telefono1,
                            telefono2,
                            email,
                            horario,
                            horarioextras,
                            embebido,
                            urlfacebook,
                            urlx,
                            urlinstagram
                        }
                    })
                    .done(function(msg) {
                        Swal.fire({
                            title: 'Actualización exitosa!',
                            text: msg.mensaje,
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status === 422) {
                            let errors = jqXHR.responseJSON.errors;
                            let errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += `• ${value[0]}<br>`;
                            });
                            Swal.fire({
                                title: 'Errores de validación',
                                html: errorMessages,
                                icon: 'error',
                                confirmButtonText: 'ok'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Algo salió mal. Intenta nuevamente.',
                                icon: 'error',
                                confirmButtonText: 'ok'
                            });
                        }
                    });

            });
        });
    </script>
@endsection
