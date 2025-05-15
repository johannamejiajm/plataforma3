{{-- @extends('publico.plantilla.plantilla')

@section('title')
  {{ $evento->titulo }}
@endsection

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-3">{{ $evento->titulo }}</h1>
    <p><strong>Fecha:</strong> {{ $evento->fechainicial }}</p>

    <div class="row">
        @foreach ($evento->fotos as $foto)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($foto->imagen) }}" class="card-img-top" alt="{{ $evento->titulo }}">
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        <p>{{ $evento->descripcion }}</p>
    </div>
</div>
@endsection

@section('links')

@endsection --}}
@extends('publico.plantilla.plantilla')

@section('title')
  {{ $evento->titulo }}
@endsection

@section('contenido')
<div class="container mt-4">
    <h1 class="mb-3">{{ $evento->titulo }}</h1>
    <p><strong>Fecha:</strong> {{ $evento->fechainicial }}</p>

    <!-- Contenedor principal con tres columnas -->
    <div class="evento-carousel d-flex gap-4">
        <!-- Imagen grande -->
        <div class="main-image-container flex-grow-1">
            <img src="{{ asset($evento->fotos[0]->imagen) }}" class="main-carousel-img" alt="{{ $evento->titulo }}">
        </div>

        <!-- Miniaturas -->
        <div class="carousel-thumbnails d-flex flex-column">
            @foreach ($evento->fotos as $key => $foto)
                <img src="{{ asset($foto->imagen) }}"
                    class="thumbnail-img mb-3 {{ $key == 0 ? 'active-thumbnail' : '' }}"
                    data-bs-target="#eventoCarousel"
                    data-bs-slide-to="{{ $key }}"
                    alt="Miniatura {{ $key }}">
            @endforeach
        </div>

        <!-- Descripción del evento -->
        <div class="evento-descripcion flex-grow-1">
            <p>{{ $evento->descripcion }}</p>
        </div>
    </div>
</div>


@endsection

@section('links')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

@endsection

<!-- CSS personalizado -->
<style>
    /* .main-carousel-img {
        max-height: 350px;
        object-fit: cover;
        border-radius: 12px;
        border: 3px solid #ffffff;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease-in-out;
    } */
.evento-carousel {
    display: flex;
    gap: 30px;
    align-items: flex-start;
    flex-wrap: wrap; /* Para que en móvil se apilen */
}

/* Imagen grande */
.main-image-container {
    flex: 1 1 40%; /* ocupa 40% del ancho */
    max-width: 600px;
}

/* Miniaturas */
.carousel-thumbnails {
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    gap: 15px;
    max-height: 400px;
    overflow-y: auto;
    max-width: 120px;
}

/* Descripción */
.evento-descripcion {
    flex: 1 1 40%; /* ocupa 40% del ancho */
    max-width: 600px;
    font-size: 1.1rem;
    color: #333;
    line-height: 1.5;
}

/* Imagenes y miniaturas (repite tu CSS ya usado) */
.main-carousel-img {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 12px;
    border: 3px solid #fff;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    cursor: zoom-in;
}

.thumbnail-img {
    width: 100px;
    height: 75px;
    object-fit: cover;
    cursor: pointer;
    border-radius: 8px;
    border: 2px solid transparent;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, border-color 0.2s, box-shadow 0.2s;
}

.thumbnail-img:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.active-thumbnail {
    border-color: #f6a623;
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
}

/* Responsividad */
@media (max-width: 768px) {
    .evento-carousel {
        flex-direction: column;
    }
    .main-image-container,
    .carousel-thumbnails,
    .evento-descripcion {
        max-width: 100%;
        flex: 1 1 100%;
    }
    .carousel-thumbnails {
        flex-direction: row;
        max-height: none;
        overflow-y: visible;
        justify-content: center;
        gap: 10px;
        margin-top: 15px;
    }
    .thumbnail-img {
        width: 70px;
        height: 50px;
    }
}


</style>
