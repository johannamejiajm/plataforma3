@extends('publico.script.publicaciones.publicacionesscript')

@section('title')
    Publicaciones
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
    function compartir(titulo) {
        if (navigator.share) {
            navigator.share({
                title: titulo,
                text: 'Conoce esta publicación de la Fundación Pacho’s Club.',
                url: window.location.href
            }).catch((error) => {
                console.error('Error al compartir:', error);
            });
        } else {
            alert('Tu navegador no soporta la función de compartir.');
        }
    }

    let scrollPos = 0;
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', () => scrollPos = window.scrollY);
        modal.addEventListener('hidden.bs.modal', () => window.scrollTo(0, scrollPos));
    });
</script>
@endsection

@section('tituloheader')
<div class="hero-title">
    <h1 class="hero-title">FUNDACIÓN PACHO'S CLUB</h1>
    <p class="subtitulo-amarillo">"Un equipo con una misión que también comunica."</p>
</div>
@endsection

@section('contenido')
<section class="Origen-Historia">
    <div class="contenedor-gird">
        @foreach ($publicaciones as $key => $publicacion)
            <div class="card-historia">
                <div class="card-historia-img" data-bs-toggle="modal" data-bs-target="#modalPublicacion{{ $key }}" style="cursor: pointer;">
                    @if($publicacion->fotos && count($publicacion->fotos) > 0)
                        <img src="{{ asset($publicacion->fotos[0]->imagen) }}" alt="{{ $publicacion->titulo }}">
                    @else
                        <div class="preview-no-image d-flex align-items-center justify-content-center h-100 bg-light">
                            <i class="bi bi-image fa-3x text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="card-historia-body">
                    <p class="categoria">{{ optional($publicacion->tipo)->tipo ?? 'Sin tipo' }}</p>
                    <h3 class="titulo-historia">{{ $publicacion->titulo }}</h3>
                    <p class="descripcion">Publicado el {{ \Carbon\Carbon::parse($publicacion->fecha)->format('d \d\e F \d\e Y') }}</p>
                    <a data-bs-toggle="modal" data-bs-target="#modalPublicacion{{ $key }}" class="leer-mas">Leer más <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</section>

@foreach ($publicaciones as $key => $publicacion)
    <div class="modal fade" id="modalPublicacion{{ $key }}" tabindex="-1" aria-labelledby="modalLabel{{ $key }}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <h5 class="modal-title" id="modalLabel{{ $key }}">{{ $publicacion->titulo }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body p-5">
                    <div class="tarjeta-barra mb-3">
                        <div class="tarjeta-info-mini">
                            <i class="bi bi-pin-angle-fill text-danger"></i>
                            <strong>Tipo:</strong> {{ optional($publicacion->tipo)->tipo ?? 'Sin tipo' }}
                        </div>
                        <div class="tarjeta-info-mini">
                            <i class="bi bi-person-fill text-primary"></i>
                            <strong>Autor:</strong> {{ optional($publicacion->usuario)->name ?? 'Anónimo' }}
                        </div>
                        <div class="tarjeta-info-mini">
                            <i class="bi bi-calendar-event-fill text-info"></i>
                            <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}
                        </div>
                    </div>

                    <p>{!! $publicacion->contenido !!}</p>

                    @if($publicacion->fotos && count($publicacion->fotos) > 0)
                        @php $carouselId = 'carouselPublicacion' . $key; @endphp
                        <div id="{{ $carouselId }}" class="carousel slide mt-4" data-bs-ride="carousel">
                            <h4 class="text-center mb-3">Galería</h4>
                            <div class="carousel-inner">
                                @foreach ($publicacion->fotos as $i => $foto)
                                    <div class="carousel-item @if($i === 0) active @endif">
                                        <img src="{{ asset($foto->imagen) }}" class="d-block w-100" alt="Imagen {{ $i + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
                        </div>
                    @endif

                    <div class="d-flex gap-3 flex-wrap mt-4">
                        <button class="btn btn-outline-primary d-flex align-items-center gap-2" onclick="compartir('{{ $publicacion->titulo }}')">
                            <i class="bi bi-share-fill"></i> Compartir
                        </button>
                        <a href="https://wa.me/3147949465" class="btn btn-success d-flex align-items-center gap-2" target="_blank">
                            <i class="bi bi-whatsapp"></i> Contáctanos
                        </a>
                    </div>

                    <div class="modal-footer mt-4">
                        <small class="text-muted">Publicado: {{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}</small>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection