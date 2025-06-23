@extends('publico.script.publicaciones.quienessomosscript')

@section('tituloheader')
   <p class="titulo-blanco"> FUNDACION PACHO'S CLUB</p>
@endsection

@section('subtituloheader')
    <p class="subtitulo-amarillo">"Un equipo con una misión"</p>
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
