@extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            let tablaPublicaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });

        $(document).ready(function() {
            $('#donaciones').DataTable();
        });
    </script>
@endsection
