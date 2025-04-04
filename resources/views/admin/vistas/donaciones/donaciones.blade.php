@extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });
    </script>
@endsection
