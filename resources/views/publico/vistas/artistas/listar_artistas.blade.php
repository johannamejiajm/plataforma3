@extends('publico.script.artistas.listarartistasscript')

@section('tituloheader')
    <p class="titulo-blanco"> FUNDACION PACHO'S CLUB</p>
@endsection

@section('subtituloheader')
    <p class="subtitulo-amarillo">"Quienes han compartido su talento con nosotros"</p>
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


    <div class="container publicaciones-container" style="margin-top: 50px;">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($artistas->isEmpty())
            <p>No hay artistas activos en este momento.</p>
        @else
            <div class="row" id="artistas-grid">
                @foreach ($artistas as $artista)
                    <div class="col-md-4 col-sm-6 mb-4 publicacion-item" data-id="{{ $artista->id }}">
                        <div class="publicacion-preview d-flex flex-row align-items-start h-100">
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
                            <div class="preview-content ms-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="preview-title">{{ $artista->nombre }}</h3>
                                    <p class="preview-excerpt">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($artista->descripcion), 100, '...') }}
                                    </p>
                                    <a href="#" class="btn btn-outline-light btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalArtista{{ $artista->id }}">
                                        Leer más
                                    </a>
                                </div>
                                <div class="preview-footer d-flex flex-column mt-3">
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

                    {{-- Modal con toda la información --}}
                    <div class="modal fade" id="modalArtista{{ $artista->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $artista->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white justify-content-center position-relative">
                                    <h4 class="modal-title w-100 text-center fw-bold m-0" id="modalLabel{{ $artista->id }}">
                                        {{ $artista->nombre }}
                                    </h4>
                                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($artista->imagen)
                                        <img src="{{ asset('storage/' . $artista->imagen) }}" alt="{{ $artista->nombre }}" class="img-fluid rounded mb-3">
                                    @endif
                                    <p style="word-break: break-word;">{!! nl2br(e($artista->descripcion)) !!}</p>
                                    <hr>
                                    <p><strong>Teléfono:</strong> {{ $artista->telefono ?? 'No disponible' }}</p>
                                    <p><strong>Email:</strong> {{ $artista->email ?? 'No disponible' }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

