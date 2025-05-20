@extends('admin.plantilla.layout')
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#linkArtistas').addClass('active');
            let tablaPublicaciones = new DataTable('#tablaartistas', {
                responsive: true
            });
        });
    </script>
@endsection
