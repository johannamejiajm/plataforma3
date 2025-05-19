@extends('publico.plantilla.plantilla')

@section('title')
Historia
@endsection


@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
ORIGEN E HISTORIAS
@endsection


@section('contenido')


<section class="Origen-Historia">

    <div class="contenedor-gird">
        @if ($historias)
        @foreach ($historias as $historia)
        <div class="item">

            <a href="#historia{{ $loop->index }}">
                <img src="{{ asset($historia->fotos[0]->imagen)}}" alt="Imagen 1">
            </a>
            <a href="#historia{{ $loop->index }}">
                {{ $historia->titulo }}
            </a>

            <p>{{ $historia->fechainicial }}</p>
        </div>

        @endforeach
        @endif
    </div>
</section>
@if ($historias)
@foreach ($historias as $key => $historia)
<div id="historia{{ $key }}" class="contenedor">

    <div class="contenido">
        <h2>{{ $historia->titulo }}</h2>
        <hr>
        <p>{{ $historia->contenido }}</p>
    </div>
    <div class="contenedor">
        <h2 class="text-center mb-4">Galeria</h2>

        @php
        $carouselId = 'carruselImagenes' . $key;
        @endphp

        <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false" data-bs-wrap="true">
            <div class="carousel-inner">
                @if ($historia->fotos)
                @foreach ($historia->fotos as $index => $foto)
                <div class="carousel-item @if($index === 0) active @endif">
                    <img src="{{ asset($foto->imagen)}}" class="d-block w-100" alt="{{ $historia->titulo }}">
                </div>
                @endforeach
                @endif
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
</div>
@endforeach

@endif
</html>
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>

@endsection

