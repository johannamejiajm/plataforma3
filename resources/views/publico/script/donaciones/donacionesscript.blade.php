@extends('publico.script.donaciones.donacionesscript')
@section('script')
    <script>
        $(document).ready(function() {
            $("#guardardonante").on('click', function(e){
                e.preventDefault();
                
                var fecha = $("#fecha").val();
                var donante = $("#donante").val();
                var contacto = $("#contacto").val();               
                var donacion = $("#donacion").val();
                var soporte = $("#soporte").val();
                var estado = $("#estado").val();
                $.ajax({
                    method: "POST",
                    url: "/donaciones",
                    data: {
                        "__token": "{{ csrf_token() }}",                     
                        fecha,
                        donante,
                        contacto,
                        donacion,
                        soporte,
                        estado
                        
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
                    var mensaje = encodeURIComponent("Hola, Quiero Hacer una Donacion... " + nombre + " ha sido registrado exitosamente en la plataforma.");
                    var url = https://wa.me/${numeroWhatsApp}?text=${mensaje};
                    window.location.href = url;
                });
            });
        });
    </script>
@endsection