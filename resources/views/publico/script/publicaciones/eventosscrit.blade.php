{{-- <!-- Script para miniaturas activas -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const thumbnails = document.querySelectorAll('.thumbnail-img');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                thumbnails.forEach(t => t.classList.remove('active-thumbnail'));
                thumb.classList.add('active-thumbnail');
            });
        });
    });
</script>
@endsection --}}

<script>
    document.addEventListener('DOMContentLoaded', () => {
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

