@extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {

            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });

        $(document).ready(function() {
            $('#donaciones').DataTable();

            function mostrarBotones(id) {
        // Primero, ocultamos todos los botones de las demás donaciones
        let botones = document.querySelectorAll('[id^="botones-"]');
        botones.forEach(function (boton) {
            boton.style.display = 'none';
        });

        // Ahora, mostramos los botones correspondientes a la donación seleccionada
        let botonesSeleccionados = document.getElementById('botones-' + id);
        botonesSeleccionados.style.display = 'block';
    }
        });
    </script>
@endsection
