@extends('admin.publicaciones.publicacionesscript')
@section('script')
    <script>
        $(document).ready(function() {
            let tablaPublicaciones = new DataTable('#tablapublicaciones', {
                responsive: true
            });
        });
    </script>
@endsection