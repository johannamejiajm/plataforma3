@extends('admin.plantilla.layout')
@section('scripts')
    <script>
        $(document).ready(function() {
            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
            $('#donaciones').DataTable();
        });

        function confirmarEstado(id, estado) {

            $('#idDonacion').val(id);
            if(estado==1){
                $('#Modalaprobado').modal('show');
            }else{
                denegar(id);
            }
        }

        function aprobar(){
            var id = $("#idDonacion").val();
            var soporte = $("#soporte")[0].files[0]; // obtenemos el archivo del input

            var formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("id", id); // nombre igual al que usas en el controlador
            formData.append("estado", 1); // nombre igual al que usas en el controlador
            formData.append("soporte", soporte); // nombre del campo file

            $.ajax({
            method: "POST",
            url: "{{ url('/admin/donaciones/update_estado') }}",
            data: formData,
            processData: false,
            contentType: false,
            success: function(msg) {
                $('#Modalaprobado').modal('hide');
                Swal.fire({
                title: '¡Actualización estado exitosa!',
                text: msg.mensaje,
                icon: 'success',
                confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                let mensaje = 'Ocurrió un problema al enviar el archivo.';
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                // Concatenar todos los mensajes de error de validación
                mensaje = Object.values(xhr.responseJSON.errors).flat().join('\n');
                }
                Swal.fire({
                title: 'Error',
                text: mensaje,
                icon: 'error',
                confirmButtonText: 'OK'
                });
            }
            });
        }

        function denegar(id){
            var id = $("#idDonacion").val();
            $.ajax({
            method: "POST",
            url: "{{ url('/admin/donaciones/update_estado') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                estado:2,
                id
            },
            success: function(msg) {
                Swal.fire({
                title: '¡Actualización estado exitosa!',
                text: msg.mensaje,
                icon: 'success',
                confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                let mensaje = 'Ocurrió un problema al enviar el archivo.';
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                // Concatenar todos los mensajes de error de validación
                mensaje = Object.values(xhr.responseJSON.errors).flat().join('\n');
                }
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

