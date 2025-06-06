@extends('admin.plantilla.layout')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    .done(function(msg) {
                        Swal.fire({
                            title: 'Actualización exitosa!',
                            text: msg.mensaje,
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status === 422) {
                            let errors = jqXHR.responseJSON.errors;
                            let errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += • ${value[0]}<br>;
                            });
                            Swal.fire({
                                title: 'Errores de validación',
                                html: errorMessages,
                                icon: 'error',
                                confirmButtonText: 'ok'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Algo salió mal. Intenta nuevamente.',
                                icon: 'error',
                                confirmButtonText: 'ok'
                            });
                        }
                    });
</script>
<script>
$(document).ready(function() {
    $('#linkInstitucional').addClass('active');
 });
</script>

@endsection
