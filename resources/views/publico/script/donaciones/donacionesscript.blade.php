@extends('publico.plantilla.plantilla')
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#donaciones').addClass('active');
             $("#guardardonante").on('click', function (e) {
                e.preventDefault();

                // Captura los valores del formulario
                var idtipo = $("#idtipo").val();
                var nombre = $("#nombre").val();
                var apellido = $("#apellido").val();
                var email = $("#email").val();
                var telefono = $("#telefono").val();
                var donacion = $("#donacion").val();
                var estado = 0;

                $.ajax({
                    method: "POST",
                    url: "/donaciones",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        idtipo,
                        nombre,
                        apellido,
                        email,
                        telefono,
                        donacion,
                        estado
                    },
                    success: function (msg) {
                        Swal.fire({
                            title: '¡Donación registrada!',
                            text: msg.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Continuar'
                        }).then(() => {
                            const donante = nombre + " " + apellido;
                            const mensaje = encodeURIComponent(`Hola, soy ${donante} y quiero hacer una donación`);
                            const url = `https://wa.me/573118883105?text=${mensaje}`;

                            // Generar el código QR
                            $("#qrcode").html(""); // Limpiar QR anterior si existe
                            new QRCode(document.getElementById("qrcode"), {
                                text: url,
                                width: 200,
                                height: 200
                            });

                            // Asignar URL al botón del modal
                            $("#whatsappLink").attr("href", url);

                            // Mostrar el modal con QR
                            $("#qrModal").modal("show");
                        });
                    },
                    error: function (xhr) {
                        let mensajeError = "Ocurrió un error inesperado.";
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            mensajeError = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al registrar la donación',
                            text: mensajeError
                        });
                    }
                });
            });
        });
    </script>
@endsection