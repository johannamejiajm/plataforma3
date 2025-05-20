@extends('admin.plantilla.layout')
@section('scripts')
<script>
    $(document).ready(function() {
        $('#linkDonaciones').addClass('active');
        const tabla = $('#tablaDonaciones').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });
    });

    function mostrarBotones(id) {
        // Primero, ocultamos todos los botones de las demás donaciones
        let botones = document.querySelectorAll('[id^="botones-"]');
        botones.forEach(function(boton) {
            boton.style.display = 'none';
        });

        // Ahora, mostramos los botones correspondientes a la donación seleccionada
        let botonesSeleccionados = document.getElementById('botones-' + id);
        botonesSeleccionados.style.display = 'block';
    }

</script>
@endsection
