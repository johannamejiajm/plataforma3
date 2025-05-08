@extends('publico.script.publicaciones.inicioscript')

@section('titulo')
<title>Inicio</title>
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/inicio.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('contenido')
<section class="hero-1">
    <div class="hero-content">
        <h1>Transformando Vidas a Través del Deporte</h1>
        <p>Esta fundación fomenta una educación deportiva de calidad, respaldada por el sector privado, dirigida a niños y niñas de comunidades vulnerables, desplazadas y con escasos recursos en el municipio.</p>
        <div class="call-to-action">
            <a href="participa.html" class="button primary">Apóyanos Ahora</a>
            <a href="nuestros-proyectos.html" class="button secondary">Conoce Nuestros Proyectos</a>
        </div>
    </div>
    <div class="hero-image">
        <img src="https://ichef.bbci.co.uk/ace/ws/640/cpsprodpb/15665/production/_107435678_perro1.jpg.webp"
            alt="Imagen representativa de la labor de tu fundación">
    </div>
</section>

<div class="contenedor">
    <h2 class="text-center mb-4">GALERIA</h2>
    <div id="carruselImagenes1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen9.jpg') }}"
                    class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item ">
                <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen14.jpg') }}"
                    class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item ">
                <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen15.jpg') }}"
                    class="d-block w-100" alt="Imagen 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>

<div class="container my-4">
    <h2 class="mb-4">Eventos</h2>
    <div class="row">
        @foreach ($publicaciones as $publicacion)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($publicacion->fotos->isNotEmpty())
                        <img src="{{ $publicacion->fotos->first()->imagen }}" class="card-img-top" alt="Imagen de {{ $publicacion->titulo }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="noticias.html" class="btn btn-outline-primary mt-2">Ver todos los eventos</a>
    </div>
</div>

<div class="container my-4">
    <h2 class="mb-4">Historias</h2>
    <div class="row">
        @foreach ($publicaciones as $publicacion)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($publicacion->fotos->isNotEmpty())
                        <img src="{{ $publicacion->fotos->first()->imagen }}" class="card-img-top" alt="Imagen de {{ $publicacion->titulo }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="noticias.html" class="btn btn-outline-primary mt-2">Ver todas las historias</a>
    </div>
</div>

<div class="container my-4">
    <h2 class="mb-4">Noticias</h2>
    <div class="row">
        @foreach ($publicaciones as $publicacion)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if ($publicacion->fotos->isNotEmpty())
                        <img src="{{ $publicacion->fotos->first()->imagen }}" class="card-img-top" alt="Imagen de {{ $publicacion->titulo }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        <a href="noticias.html" class="btn btn-outline-primary mt-2">Ver todas las noticias</a>
    </div>
</div>



<section class="llamada-a-la-accion-final">
    <h2>Únete a Nuestra Causa</h2>
    <p>[Mensaje inspirador final animando a la participación.]</p>
    <div class="botones-finales">
        <a href="donar.html" class="button primary">Donar</a>
        <a href="voluntariado.html" class="button secondary">Ser Voluntario</a>
        <a href="alianzas.html" class="button outline">Colaborar con Nosotros</a>
    </div>
</section>
@endsection

@section('footer')
<div class="container-fluid">
    <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
        <div class="d-flex gap-3 align-items-center">
            <img src="../assets/images/logos/favicon.png" alt="icon">
            <p class="fs-4 mb-0">Fundacion Pachos Club. </p>
        </div>
        <div>
            <p class="mb-0">Produced by <a target="_blank" href="https://www.wrappixel.com/"
                    class="text-primary link-primary">Wrappixel</a>.</p>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/inicio.js') }}"></script>
@endsection