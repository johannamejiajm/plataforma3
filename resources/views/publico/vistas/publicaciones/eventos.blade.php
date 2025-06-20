@extends('publico.script.publicaciones.eventosscrit')

@section('title')
Eventos
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/stylespublicidad.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script>
    function compartir(titulo = 'Eventos de la Fundación Pacho\'s Club', texto = 'Conoce los eventos de la Fundación Pacho\'s Club.') {
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
        <p class="subtitulo-amarillo">"Cada evento, una oportunidad de ayudar"</p>
    </div>
@endsection

@section('contenido')
<section class="Eventos-Seccion">
    <div class="contenedor-eventos">
        @if ($eventos && count($eventos) > 0)
            @foreach ($eventos as $key => $evento)
                <div class="card-evento">
                    <div class="card-evento-img"
                         data-bs-toggle="modal"
                         data-bs-target="#modalEvento{{ $key }}"
                         style="cursor: pointer;"
                         role="button"
                         tabindex="0"
                         aria-label="Abrir evento: {{ $evento['evento'] }}"
                         onkeydown="if(event.key === 'Enter' || event.key === ' ') { event.preventDefault(); this.click(); }">
                        @if(!empty($evento['imagen']))
                            <img src="{{ asset('storage/' . $evento['imagen']) }}"
                                 alt="Imagen del evento {{ $evento['evento'] }}"
                                 loading="lazy">
                        @else
                            <div class="placeholder-image d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-event" style="font-size: 3rem; color: #ccc;"></i>
                            </div>
                        @endif
                    </div>
                    <div class="card-evento-body">
                        <p class="categoria-evento">Evento</p>
                        <h3 class="titulo-evento">{{ $evento['evento'] }}</h3>
                        <p class="descripcion-evento">
                            Del {{ \Carbon\Carbon::parse($evento['fechainicial'])->format('d \\d\\e F \\d\\e Y') }}
                            al {{ \Carbon\Carbon::parse($evento['fechafinal'])->format('d \\d\\e F \\d\\e Y') }}
                        </p>
                        <a data-bs-toggle="modal"
                           data-bs-target="#modalEvento{{ $key }}"
                           class="ver-mas"
                           role="button"
                           aria-label="Ver más sobre {{ $evento['evento'] }}">
                            Ver más <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center" role="alert">
                    <i class="bi bi-calendar-x me-2"></i>
                    No hay eventos disponibles en este momento.
                </div>
            </div>
        @endif
    </div>
</section>

{{-- Modales para cada evento --}}
@if ($eventos && count($eventos) > 0)
    @foreach ($eventos as $key => $evento)
        <div class="modal fade"
             id="modalEvento{{ $key }}"
             tabindex="-1"
             aria-labelledby="modalEventoLabel{{ $key }}"
             aria-hidden="true"
             data-bs-focus="false">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    {{-- Encabezado --}}
                    <div class="modal-header modal-header-custom">
                        <h5 class="modal-title" id="modalEventoLabel{{ $key }}">
                            {{ $evento['evento'] }}
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
                                    <i class="bi bi-calendar-event-fill text-danger" aria-hidden="true"></i>
                                    <strong>Tipo:</strong> Evento
                                </div>
                                <div class="tarjeta-info-mini">
                                    <i class="bi bi-check-circle-fill text-success" aria-hidden="true"></i>
                                    <strong>Estado:</strong> {{ $evento['estado'] == 1 ? 'Activo' : 'Inactivo' }}
                                </div>
                                <div class="tarjeta-info-mini">
                                    <i class="bi bi-calendar-plus-fill text-info" aria-hidden="true"></i>
                                    <strong>Inicio:</strong> {{ \Carbon\Carbon::parse($evento['fechainicial'])->format('d/m/Y') }}
                                </div>
                                <div class="tarjeta-info-mini">
                                    <i class="bi bi-calendar-x-fill text-warning" aria-hidden="true"></i>
                                    <strong>Final:</strong> {{ \Carbon\Carbon::parse($evento['fechafinal'])->format('d/m/Y') }}
                                </div>
                                @if(isset($evento['ubicacion']) && !empty($evento['ubicacion']))
                                    <div class="tarjeta-info-mini">
                                        <i class="bi bi-geo-alt-fill text-primary" aria-hidden="true"></i>
                                        <strong>Ubicación:</strong> {{ $evento['ubicacion'] }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Contenido del evento --}}
                        @if(isset($evento['descripcion']) && !empty($evento['descripcion']))
                            <div class="evento-contenido mb-4">
                                <p>{{ $evento['descripcion'] }}</p>
                            </div>
                        @endif

                        {{-- Imagen del evento --}}
                        @if(!empty($evento['imagen']))
                            <div class="galeria-contenedor">
                                <h4 class="text-center mt-4 mb-4">Imagen del Evento</h4>
                                <div class="evento-imagen-container">
                                    <img src="{{ asset('storage/' . $evento['imagen']) }}"
                                         class="img-fluid rounded evento-imagen"
                                         alt="Imagen del evento {{ $evento['evento'] }}"
                                         loading="lazy">
                                </div>
                            </div>
                        @else
                            <div class="alert alert-secondary text-center" role="alert">
                                <i class="bi bi-image me-2"></i>
                                No hay imagen disponible para este evento.
                            </div>
                        @endif

                        {{-- Botones de acción --}}
                        <div class="d-flex gap-3 flex-wrap mt-4">
                            <button class="btn btn-outline-primary d-flex align-items-center gap-2"
                                    onclick="compartir('{{ $evento['evento'] }}', '{{ isset($evento['descripcion']) ? Str::limit($evento['descripcion'], 100) : 'Evento de la Fundación Pacho\'s Club' }}')"
                                    aria-label="Compartir este evento">
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
                                Evento: {{ \Carbon\Carbon::parse($evento['fechainicial'])->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($evento['fechafinal'])->format('d/m/Y') }}
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
