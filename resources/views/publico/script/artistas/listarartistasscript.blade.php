@extends('publico.plantilla.plantilla')
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
    $(document).ready(function () {
             $('#artistas').addClass('active');
        });
</script>
@endsection
