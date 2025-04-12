@extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
<<<<<<< HEAD
            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });
=======
            let tablaPublicaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });

        $(document).ready(function() {
            $('#donaciones').DataTable();
        });
>>>>>>> 3cfcd0e6f3e974487b2da20c45ac1dc1a4e8d082
    </script>
@endsection
