@extends('publico.script.publicaciones.historiasscript')

@section('title')
Historia
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
    function compartir(titulo = 'Historia de la Fundación Pacho\'s Club', texto = 'Conoce la historia de la Fundación Pacho\'s Club.') {
        if (navigator.share) {
            navigator.share({
                title: titulo,
                text: texto,
                url: window.location.href
            }).then(() => {
                console.log('Contenido compartido exitosamente');
            }).catch((error) => {
                console.error('Error al compartir:', error);
                // Fallback para copiar al portapapeles
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(window.location.href)
                        .then(() => alert('Enlace copiado al portapapeles'))
                        .catch(() => alert('No se pudo copiar el enlace'));
                }
            });
        } else {
            // Fallback mejorado para navegadores que no soportan Web Share API
            if (navigator.clipboard) {
                navigator.clipboard.writeText(window.location.href)
                    .then(() => alert('Enlace copiado al portapapeles'))
                    .catch(() => alert('No se pudo copiar el enlace'));
            } else {
                alert('Tu navegador no soporta la función de compartir.');
            }
        }
    }

    // Manejo de scroll position para modales
    document.addEventListener('DOMContentLoaded', function() {
        let scrollPos = 0;
        const modals = document.querySelectorAll('.modal');

        modals.forEach(modal => {
            modal.addEventListener('show.bs.modal', function () {
                scrollPos = window.scrollY;
                document.body.style.position = 'fixed';
                document.body.style.top = `-${scrollPos}px`;
                document.body.style.width = '100%';
            });

            modal.addEventListener('hidden.bs.modal', function () {
                document.body.style.position = '';
                document.body.style.top = '';
                document.body.style.width = '';
                window.scrollTo(0, scrollPos);
            });
        });
    });
</script>
@endsection

@section('tituloheader')
    <div class="hero-title">
        <h1 class="hero-title">FUNDACIÓN PACHO'S CLUB</h1>
        <p class="subtitulo-amarillo">"Donde los sueños toman forma digital y tu historia comienza."</p>
    </div>
@endsection

@section('contenido')
<section class="Origen-Historia">
    <div class="contenedor-gird">
        @if ($historias && count($historias) > 0)
            @foreach ($historias as $key => $historia)
                <div class="card-historia">
                    <div class="card-historia-img"
                         data-bs-toggle="modal"
                         data-bs-target="#modalHistoria{{ $key }}"
                         style="cursor: pointer;"
                         role="button"
                         tabindex="0"
                         aria-label="Abrir historia: {{ $historia->titulo }}"
                         onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); this.click(); }">
                        @if($historia->fotos && count($historia->fotos) > 0)
                            <img src="{{ asset($historia->fotos[0]->imagen) }}"
                                 alt="Imagen relacionada a {{ $historia->titulo }}"
                                 loading="lazy">
                        @else
                            <div class="placeholder-image d-flex align-items-center justify-content-center">
                                <i class="bi bi-image" style="font-size: 3rem; color: #ccc;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-historia-body">
                        <p class="categoria">Historia</p>
                        <h3 class="titulo-historia">{{ $historia->titulo }}</h3>
                        <p class="descripcion">
                            Publicado el {{ \Carbon\Carbon::parse($historia->fechainicial)->format('d \\d\\e F \\d\\e Y') }}
                        </p>
                        <a data-bs-toggle="modal"
                           data-bs-target="#modalHistoria{{ $key }}"
                           class="leer-mas"
                           role="button"
                           aria-label="Leer más sobre {{ $historia->titulo }}">
                            Leer más <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    No hay historias disponibles en este momento.
                </div>
            </div>
        @endif
    </div>
</section>

{{-- Modales para cada historia --}}
@if ($historias && count($historias) > 0)
    @foreach ($historias as $key => $historia)
        <div class="modal fade"
             id="modalHistoria{{ $key }}"
             tabindex="-1"
             aria-labelledby="modalLabel{{ $key }}"
             aria-hidden="true"
             data-bs-focus="false">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    {{-- Encabezado --}}
                    <div class="modal-header modal-header-custom">
                        <h5 class="modal-title" id="modalLabel{{ $key }}">
                            {{ $historia->titulo }}
                        </h5>
                        <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal"
                                aria-label="Cerrar modal"></button>
                    </div>

                    {{-- Cuerpo --}}
                    <div class="modal-body p-5">
                        <div class="d-flex flex-wrap justify-content-between mb-3">
                            <div class="tarjeta-barra">
                                <div class="tarjeta-info-mini">
                                    <i class="bi bi-pin-angle-fill text-danger" aria-hidden="true"></i>
                                    <strong>Tipo:</strong> Historia
                                </div>
                                <div class="tarjeta-info-mini">
                                    <i class="bi bi-person-fill text-primary" aria-hidden="true"></i>
                                    <strong>Autor:</strong> {{ $historia->autor ?? 'Desconocido' }}
                                </div>
                                <div class="tarjeta-info-mini">
                                    <i class="bi bi-calendar-event-fill text-info" aria-hidden="true"></i>
                                    <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($historia->fechainicial)->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>

                        {{-- Contenido de la historia --}}
                        <div class="historia-contenido mb-4">
                            <p>{{ $historia->contenido }}</p>
                        </div>

                        {{-- Galería de imágenes --}}
                        @if($historia->fotos && count($historia->fotos) > 0)
                            @php $carouselId = 'carousel' . $key; @endphp
                            <div class="galeria-contenedor">
                               
                                <div id="{{ $carouselId }}"
                                     class="carousel slide"
                                     data-bs-ride="carousel"
                                     aria-label="Galería de imágenes de {{ $historia->titulo }}">

                                    {{-- Indicadores del carrusel --}}
                                    @if(count($historia->fotos) > 1)
                                        <div class="carousel-indicators">
                                            @foreach ($historia->fotos as $index => $foto)
                                                <button type="button"
                                                        data-bs-target="#{{ $carouselId }}"
                                                        data-bs-slide-to="{{ $index }}"
                                                        @if($index === 0) class="active" aria-current="true" @endif
                                                        aria-label="Ir a imagen {{ $index + 1 }}"></button>
                                            @endforeach
                                        </div>
                                    @endif

                                    {{-- Imágenes del carrusel --}}
                                    <div class="carousel-inner">
                                        @foreach ($historia->fotos as $index => $foto)
                                            <div class="carousel-item @if($index === 0) active @endif">
                                                <img src="{{ asset($foto->imagen) }}"
                                                     class="d-block w-100"
                                                     alt="Imagen {{ $index + 1 }} de la galería de {{ $historia->titulo }}"
                                                     loading="lazy">
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- Controles del carrusel --}}
                                    @if(count($historia->fotos) > 1)
                                        <button class="carousel-control-prev"
                                                type="button"
                                                data-bs-target="#{{ $carouselId }}"
                                                data-bs-slide="prev"
                                                aria-label="Imagen anterior">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Anterior</span>
                                        </button>
                                        <button class="carousel-control-next"
                                                type="button"
                                                data-bs-target="#{{ $carouselId }}"
                                                data-bs-slide="next"
                                                aria-label="Siguiente imagen">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Siguiente</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="alert alert-secondary text-center" role="alert">
                                <i class="bi bi-images me-2"></i>
                                No hay imágenes disponibles para esta historia.
                            </div>
                        @endif

                        {{-- Botones de acción --}}
                        <div class="d-flex gap-3 flex-wrap mt-4">
                            <button class="btn btn-outline-primary d-flex align-items-center gap-2"
                                    onclick="compartir('{{ $historia->titulo }}', '{{ Str::limit($historia->contenido, 100) }}')"
                                    aria-label="Compartir esta historia">
                                <i class="bi bi-share-fill" aria-hidden="true"></i> Compartir
                            </button>

                            <a href="https://wa.me/3147949465"
                                class="btn btn-success d-flex align-items-center gap-2"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="Contáctanos por WhatsApp">
                                <i class="bi bi-whatsapp" aria-hidden="true"></i> Contáctanos
                            </a>
                        </div>

                        {{-- Pie del modal --}}
                        <div class="modal-footer border-top mt-4 pt-3">
                            <small class="text-muted">
                                <i class="bi bi-calendar3 me-1" aria-hidden="true"></i>
                                Publicado: {{ \Carbon\Carbon::parse($historia->fechainicial)->format('d/m/Y') }}
                            </small>
                            <button type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal">
                                <i class="bi bi-x-lg me-1" aria-hidden="true"></i>Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@endsection
