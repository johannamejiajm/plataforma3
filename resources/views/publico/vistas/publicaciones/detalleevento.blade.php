@extends('publico.plantilla.plantilla')

@section('title')
  {{ $evento->titulo }}
@endsection

@section('contenido')
<div class="container mt-5">
    <h1 class="mb-3 text-center">{{ $evento->titulo }}</h1>
    <p class="text-center"><strong>Fecha:</strong> {{ $evento->fechainicial }}</p>

    <!-- Carrusel con efecto Coverflow Moderno -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($evento->fotos as $foto)
                <div class="swiper-slide">
                    <img src="{{ asset($foto->imagen) }}" alt="Imagen del evento">
                </div>
            @endforeach
        </div>

        <!-- Botones -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Descripción del evento -->
    <div class="mt-4 evento-descripcion text-center">
        <p>{{ $evento->contenido }}</p>
    </div>
    <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Fotos</h2>
                <div class="galeria-port">
                     @foreach ($evento->fotos as $foto)
                    <div class="imagen-port">
                        <img src="{{ asset($foto->imagen) }}" alt="Imagen del evento">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="imagen-port">
                        <img src="{{ asset($foto->imagen) }}" alt="Imagen del evento">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img3.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img1.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img4.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img5.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img6.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/img7.jpg" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nuestro trabajo</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
</div>

@endsection

@section('links')
<!-- SwiperJS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 2.5,
                slideShadows: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>

<style>
body {
    background: #f2f4f8;
}

.swiper {
    width: 100%;
    max-width: 1200px;
    padding-top: 50px;
    padding-bottom: 50px;
}

.swiper-slide {
    background: white;
    width: 320px;
    height: 450px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

.swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
}

.evento-descripcion {
    max-width: 800px;
    margin: 0 auto;
    font-size: 1.1rem;
    color: #444;
    line-height: 1.6;
}

.swiper-button-next,
.swiper-button-prev {
    color: #333;
    background: #fff;
    border-radius: 50%;
    padding: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}





.portafolio {
    background: #f2f2f2;
}

.galeria-port {
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
}

.imagen-port {
    width: 24%;
    margin-bottom: 10px;
    overflow: hidden;
    position: relative;
    cursor: pointer;
    box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
}

.imagen-port > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.hover-galeria {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    transform: scale(0);
    background: hsla(221, 94%, 43%, 0.7);
    transition: transform .5s;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.hover-galeria img {
    width: 50px;
}

.hover-galeria p {
    color: #ffffff;
}

.imagen-port:hover .hover-galeria {
    transform: scale(1);
}



</style>

@endsection

