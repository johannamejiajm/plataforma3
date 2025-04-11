@extends('publico.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            $("#guardarArtista").on('click', function(e){
                e.preventDefault();
                var nidentidad = $("#nidentidad").val();
                var nombre = $("#nombre").val();
                var email = $("#email").val();
                var telefono = $("#telefono").val();
                var foto = $("#foto").val();
                var descripcion = $("#descripcion").val();
                var fecharegistro = $("#fecharegistro").val();
                var estado = $("#estado").val();
                $.ajax({
                    method: "POST",
                    url: "/artistas",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        nidentidad,
                        nombre,
                        email,
                        telefono,
                        foto,
                        descripcion,
                        fecharegistro
                    }
                })
                .done(function(msg) {
                    Swal.fire({
                        title: 'Exitoso!',
                        text: msg.mensaje,
                        icon: 'success',
                        confirmButtonText: 'Cool'
                    });
                    $("#idmodal").modal("show");
                    var numeroWhatsApp = '573168262761'; // Número en formato internacional sin "+" ni espacios
                    var mensaje = encodeURIComponent("Hola, el artista " + nombre + " ha sido registrado exitosamente en la plataforma.");
                    var url = 'https://wa.me/${numeroWhatsApp}?text=${mensaje}';
                    window.location.href = url;
                });
                
            });
        });
    </script>
@endsection