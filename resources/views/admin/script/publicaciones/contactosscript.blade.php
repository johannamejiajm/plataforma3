@extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            $("#guardarcontactos").on('click', function(e){
                e.preventDefault();
                var direccion =$("#direccion").val();
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
                    url: "/contactos/actualizar",
                    data: {
                        "_token":"{{ csrf_token() }}",
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

                });
            });
        });
    </script>
@endsection
