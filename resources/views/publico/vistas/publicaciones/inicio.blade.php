@extends('publico.script.publicaciones.inicioscript')

@section('titulo')
<title>Inicio</title>
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/inicio.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('contenido')
<section class="hero">
    <div class="hero-content">
        <h1>[Título impactante que resuma la misión de tu fundación]</h1>
        <p>[Breve descripción atractiva de lo que hace tu fundación y a quién beneficia.]</p>
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
@foreach ($publicaciones as $publicacion)

<section class="noticias-recientes">
    <h2>Noticias Recientes</h2>
    <div class="listado-noticias">
        <article class="noticia">
            
            <h3>{{ $publicacion->titulo }}</h3>
        </article>
        <article class="noticia">
            <img src="imagen-noticia-2.jpg" alt="[Título de la Noticia 2]">
            <h3>[Título de la Noticia 2]</h3>
        </article>
    </div>
    <br>
    <a href="noticias.html" class="button outline">Ver todas las noticias</a>
</section>

@endforeach


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