@extends('publico.plantilla.plantilla')

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#publicaciones').addClass('active');
    });
</script>
@endsection
