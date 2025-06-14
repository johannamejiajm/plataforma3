@extends('admin.plantilla.layout')
@section('scripts')
    <script>
        $(document).ready(function() {

            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
            $('#donaciones').DataTable();
        });

        function confirmarEstado(id, idtipo) {

            $('#idDonacion').val(id);
            if(idtipo==1){
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
            formData.append("idtipo", 1); // nombre igual al que usas en el controlador
            formData.append("soporte", soporte); // nombre del campo file

            $.ajax({
                method: "POST",
                url: "{{ url('/admin/donaciones/update_estado') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(msg) {
                        $('#Modalaprobado').modal('hide');
                        location.reload();
                    Swal.fire({
                        title: '¡Actualización estado exitosa!',
                        text: msg.mensaje,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(xhr, status, error) {

                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un problema al enviar el archivo.',
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
                idtipo:2,
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
                Swal.fire({
                title: 'Error',
                text: 'Ocurrió un problema al enviar el archivo.',
                icon: 'error',
                confirmButtonText: 'OK'
                });
            }
            });
        }
    </script>
@endsection

