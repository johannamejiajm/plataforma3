@extends('publico.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function () {
            $("#guardardonante").on('click', function (e) {
                e.preventDefault();
                var formData = new FormData();
                var idtipo = $("#idtipo").val();
                var nombre = $("#nombre").val();
                var apellido = $("#apellido").val();
                var email = $("#email").val();
                var telefono = $("#telefono").val();
                var donacion = $("#donacion").val();
                var tipodonacion = $("#tipodonacion").val();
                var estado = 0;

                var soporte = $('#soporte')[0]?.files[0];
                if (soporte) {
                    formData.append('soporte', soporte);
                }
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
                        tipodonacion,
                        estado
                    }
                })
                    .done(function (msg) {
                        Swal.fire({
                            title: 'Exitoso!',
                            text: msg.mensaje,
                            icon: 'success',
                            confirmButtonText: 'Cool'
                        });
                        $("#idmodal").modal("show");
                        var numeroWhatsApp = '573118883105'; // Número en formato internacional sin "+" ni espacios
                        var mensaje = encodeURIComponent(" Hola, soy " + donante + " y Quiero Hacer una Donacion ");
                        var url = `https://wa.me/${numeroWhatsApp}?text=${mensaje}`;
                        window.location.href = url;
                    });
            });
        });
    </script>
@endsection