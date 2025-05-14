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

    <!-- Carrusel -->
    <div id="eventoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($evento->fotos as $key => $foto)
                <div class="carousel-item @if($key == 0) active @endif">
                    <img src="{{ asset($foto->imagen) }}" class="d-block w-100" alt="{{ $evento->titulo }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#eventoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#eventoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Descripción del evento -->
    <div class="mt-4">
        <p>{{ $evento->descripcion }}</p>
    </div>
</div>
@endsection

@section('links')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection
