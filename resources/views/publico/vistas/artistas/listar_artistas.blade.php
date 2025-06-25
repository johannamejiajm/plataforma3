@extends('publico.script.artistas.artistasscript')

@section('tituloheader')
    FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
    <p class="subtitulo-amarillo">"QUIENES HAN COMPARTIDO SU TALENTO CON NOSOTROS"</p>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/artistas.css') }}">
@endsection

@section('titulo')
    <title>
        Artistas
    </title>
@endsection

@section('contenido')
    <div class="container publicaciones-container">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($artistas->isEmpty())
            <p>No hay artistas activos en este momento.</p>
        @else
            <div class="row" id="artistas-grid">
                @foreach ($artistas as $artista)
                    <div class="col-md-4 col-sm-6 mb-4 publicacion-item" data-id="{{ $artista->id }}">
                        <div class="publicacion-preview d-flex flex-row align-items-start">
                            <div class="preview-image-container">
                                @if ($artista->imagen)
                                    <img src="{{ asset('storage/' . $artista->imagen) }}" alt="{{ $artista->nombre }}"
                                        class="preview-image">
                                @else
                                    <div class="preview-no-image d-flex align-items-center justify-content-center h-100">
                                        <i class="fas fa-user fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="preview-content ms-3">
                                <h3 class="preview-title">{{ $artista->nombre }}</h3>
                                <p class="preview-excerpt" data-contenido-completo="{{ $artista->descripcion }}">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($artista->descripcion), 120) ?? 'Sin descripción' }}
                                </p>
                                <div class="preview-footer d-flex flex-column">
                                    <span class="preview-tipo">
                                        <i class="fas fa-phone"></i> {{ $artista->telefono ?? 'No disponible' }}
                                    </span>
                                    <span class="preview-fecha">
                                        <i class="fas fa-envelope"></i> {{ $artista->email ?? 'No disponible' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
