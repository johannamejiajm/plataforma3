@extends('publico.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            $("#guardardonante").on('click', function(e){
                e.preventDefault();
                var idtipo =$("#idtipo").val();
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
                        "_token":"{{ csrf_token() }}",                     
                        idtipo,
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
                    var numeroWhatsApp = '573118883105'; // Número en formato internacional sin "+" ni espacios
                    var mensaje = encodeURIComponent(" Hola, soy "  + donante + " y Quiero Hacer una Donacion " );
                    var url = `https://wa.me/${numeroWhatsApp}?text=${mensaje}`;
                    window.location.href = url;
                });
            });
        });
    </script>
@endsection