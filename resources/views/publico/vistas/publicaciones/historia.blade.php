@extends('publico.script.publicaciones.historiasscript')

{{-- @section('title')
Historia
@endsection
@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">
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
        @if ($historias)
            @foreach ($historias as $key => $historia)
                
                <div class="card-historia">
                <div class="card-historia-img" data-bs-toggle="modal" data-bs-target="#modalHistoria{{ $key }}" style="cursor: pointer;">
                    <img src="{{ asset($historia->fotos[0]->imagen) }}" alt="Imagen {{ $key }}">
                </div>
                <div class="card-historia-body">
                    <p class="categoria">Historia</p>
                    <h3 class="titulo-historia">{{ $historia->titulo }}</h3>
                    <p class="descripcion">Publicado el {{ \Carbon\Carbon::parse($historia->fechainicial)->format('d \\d\\e F \\d\\e Y') }}</p>
                    <a data-bs-toggle="modal" data-bs-target="#modalHistoria{{ $key }}" class="leer-mas">Leer más <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            @endforeach
        @endif
    </div>
</section>

@if ($historias)
    @foreach ($historias as $key => $historia)
        <!-- Modal único para cada historia -->
        <div class="modal fade" id="modalHistoria{{ $key }}" tabindex="-1" aria-labelledby="modalLabel{{ $key }}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <!-- Encabezado -->
                    <div class="modal-header modal-header-custom">
                        <h5 class="modal-title" id="modalLabel{{ $key }}">{{ $historia->titulo }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>


                    <!-- Cuerpo -->
                    <div class="modal-body p-5">


                    <div class="d-flex flex-wrap justify-content-between mb-3">
                    <div class="tarjeta-barra">
                        <div class="tarjeta-info-mini">
                            <i class="bi bi-pin-angle-fill text-danger"></i>
                            <strong>Tipo:</strong> Historia
                        </div>
                        <div class="tarjeta-info-mini">
                            <i class="bi bi-person-fill text-primary"></i>
                            <strong>Autor:</strong> {{ $historia->autor ?? 'Desconocido' }}
                        </div>
                        <div class="tarjeta-info-mini">
                            <i class="bi bi-calendar-event-fill text-info"></i>
                            <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($historia->fechainicial)->format('d/m/Y') }}
                        </div>
                    </div>

                        <!-- Texto de la historia -->
                        <div>
                            <p>{{ $historia->contenido }}</p>
                        </div>

                        <!-- Carrusel de galería -->
                        <h4 class="text-center mt-4">Galería</h4>
                        @php $carouselId = 'carousel' . $key; @endphp
                        <div id="{{ $carouselId }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($historia->fotos as $index => $foto)
                                    <div class="carousel-item @if($index === 0) active @endif">
                                        <img src="{{ asset($foto->imagen) }}" class="d-block w-100" alt="Imagen galería {{ $index }}">
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
                    </div>


                    <div class="d-flex gap-3 flex-wrap mt-3">
                        <!-- Botón Compartir -->
                        <button class="btn btn-outline-primary d-flex align-items-center gap-2" onclick="compartir()">
                            <i class="bi bi-share-fill"></i> Compartir
                        </button>

                        <!-- Botón WhatsApp -->
                        <a href="https://wa.me/3147949465"
                        class="btn btn-success d-flex align-items-center gap-2" target="_blank">
                            <i class="bi bi-whatsapp"></i> Contáctanos
                        </a>
                    </div>
                     <!-- Pie del modal -->
                    <div class="modal-footer">
                        <small class="text-muted">Publicado: {{ \Carbon\Carbon::parse($historia->fechainicial)->format('d/m/Y') }}</small>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script>
    function compartir() {
        if (navigator.share) {
            navigator.share({
                title: 'Historia de la Fundación Pacho’s Club',
                text: 'Conoce la historia de la Fundación Pacho’s Club.',
                url: window.location.href
            }).catch(console.error);
        } else {
            alert('Tu navegador no soporta la función de compartir.');
        }
    }
</script>


@endsection
