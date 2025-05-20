@extends('publico.plantilla.plantilla')
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#historia').addClass('active');
    });
</script>
@endsection