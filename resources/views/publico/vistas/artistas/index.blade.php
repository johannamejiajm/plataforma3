@extends('admin.artistas.artistasscript')
@section('script')
    <script>
        $(document).ready(function() {
            let tablaPublicaciones = new DataTable('#tablaartistas', {
                responsive: true
            });
        });
    </script>
@endsection