@extends('admin.plantilla.layout')
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            let tablaPublicaciones = new DataTable('#tablaartistas', {
                responsive: true
            });
        });
    </script>
@endsection
