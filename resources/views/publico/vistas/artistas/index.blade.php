@extends('admin.artistas.artistasscript')
@section('script')
    <script>
        $(document).ready(function() {
            let tablaArtistas = new DataTable('#tablaartistas', {
                responsive: true
            });
        });
    </script>
@endsection