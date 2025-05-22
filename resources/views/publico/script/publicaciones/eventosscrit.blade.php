
@extends('publico.plantilla.plantilla')
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        $('#eventos').addClass('active');
        const mainImage = document.querySelector('.main-carousel-img');
        const thumbnails = document.querySelectorAll('.thumbnail-img');

        thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => {
                // Cambiar la imagen grande
                mainImage.src = thumb.src;

                // Actualizar estilos de miniaturas activas
                thumbnails.forEach(t => t.classList.remove('active-thumbnail'));
                thumb.classList.add('active-thumbnail');
            });
        });
    });
</script>
@endsection
