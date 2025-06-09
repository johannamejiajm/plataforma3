@extends('publico.script.publicaciones.publicacionesscript')

@section('tituloheader')
    FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
    <p class="subtitulo-amarillo">"UN EQUIPO CON UNA MISIÓN"</p>
@endsection

@section('titulo')
    <title>Quienes Somos</title>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/quienessomos.css') }}">
@endsection

@section('contenido')
    @foreach ($informaciones as $informacion)
        <div class="container mb-5">
            <h1 class="mb-3">{{ $informacion->tipo->tipo }}</h1>

            {{-- Mostrar contenido --}}
            <p>{{ $informacion->contenido }}</p>

            {{-- Mostrar foto si existe --}}
            @if ($informacion->foto)
                <img src="{{ asset('storage/' . $informacion->foto) }}" alt="Imagen de {{ $informacion->tipo->tipo }}"
                    class="info-img">
            @endif
        </div>
    @endforeach
@endsection
