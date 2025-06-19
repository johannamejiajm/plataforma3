@extends('publico.plantilla.plantilla')
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    $(document).ready(function () {
             $('#artista').addClass('active');
                         // ...existing code...
            $("#guardarartistas").on('click', function (e) {
                e.preventDefault();

                // Crea un objeto FormData
                var formData = new FormData();
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("idevento", $("#idevento").val());
                formData.append("identidad", $("#identidad").val());
                formData.append("nombre", $("#nombre").val());
                formData.append("email", $("#email").val());
                formData.append("telefono", $("#telefono").val());
                formData.append("descripcion", $("#descripcion").val());
                formData.append("estado", 0);

                // Adjunta la imagen (asegúrate que el input tenga type="file" y id="imagen")
                var imagenInput = $("#imagen")[0];
                if (imagenInput.files.length > 0) {
                    formData.append("imagen", imagenInput.files[0]);
                }

                $.ajax({
                    method: "POST",
                    url: "/publico/artistas",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Muestra un mensaje de agradecimiento por la postulación
                        Swal.fire({
                            icon: 'success',
                            title: '¡Gracias por tu postulación!',
                            text: 'Tu información ha sido recibida correctamente. Pronto nos comunicaremos contigo.',
                            confirmButtonColor: '#3085d6',
                        }).then(function() {
                            // Limpia todos los campos del formulario
                            $("#idevento").val('');
                            $("#identidad").val('');
                            $("#nombre").val('');
                            $("#email").val('');
                            $("#telefono").val('');
                            $("#descripcion").val('');
                            $("#imagen").val('');
                        });
                    },
                    error: function(xhr) {
                        // Maneja los errores de validación y otros errores
                        let mensaje = 'Ocurrió un error al guardar el artista';
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            // Si hay errores de validación, los mostramos todos
                            mensaje = Object.values(xhr.responseJSON.errors)
                                .map(arr => arr.join('<br>'))
                                .join('<br>');
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            mensaje = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: mensaje,
                            confirmButtonColor: '#d33',
                        });
                    }
                });
            });
            // ...existing code...
                    });
</script>
@endsection
