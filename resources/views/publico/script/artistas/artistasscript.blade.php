@extends('publico.plantilla.plantilla')
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        $(document).ready(function () {
             $('#inscripcion').addClass('active');
             $("#guardarartistas").on('click', function (e) {
                e.preventDefault();

                // Captura los valores del formulario
                var idevento = $("#idevento").val();
                var identidad = $("#identidad").val();
                var nombre = $("#nombre").val();
                var email = $("#email").val();
                var telefono = $("#telefono").val();
                var imagen = $("#imagen").val();
                var descripcion = $("#descripcion").val();
                var estado = 0;

                $.ajax({
                    method: "POST",
                    url: "/publico/artistas",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        idevento,
                        identidad,
                        nombre,
                        email,
                        telefono,
                        imagen,
                        descripcion,
                        estado
                    },
                   @if (session('success'))
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: '{{ session('success') }}',
                            confirmButtonColor: '#3085d6',
                        });
                    @endif

                    @if (session('error'))
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '{{ session('error') }}',
                            confirmButtonColor: '#d33',
                        });
                    @endif

                    @if ($errors->any())
                        Swal.fire({
                            icon: 'warning',
                            title: 'Errores de validación',
                            html: `{!! implode('<br>', $errors->all()) !!}`,
                            confirmButtonColor: '#f0ad4e',
                        });
                    @endif
                            });
                        });
                    });
    </script>
@endsection