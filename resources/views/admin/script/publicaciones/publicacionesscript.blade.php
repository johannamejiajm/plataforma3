@extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            let tablaPublicaciones = new DataTable('#tablapublicaciones', {
                responsive: true
            });
        });
    </script>
@endsection
