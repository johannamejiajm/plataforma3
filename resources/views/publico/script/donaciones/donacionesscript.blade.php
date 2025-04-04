@extends('publico.plantilla.plantilla')
@section('script')
<title>Donaciones</title>

<script>
        $(document).ready(function() {
            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });
    </script>

@endsection

