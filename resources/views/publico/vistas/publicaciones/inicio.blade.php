@extends('publico.script.publicaciones.inicioscript')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('contenido')

    <body>
        <!-- Hero -->
        <section class="hero">
            <div class="swiper hero-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/futbol3.jpeg') }}" alt="Slide 1"></div>
                </div>
            </div>
            <div class="hero-text">
                <h1>Fundación Pachos Club</h1>
                <p>En la Fundación PACHO’S CLUB ofrecemos espacios que permiten contribuir con el desarrollo integral, físico y mental de la Comunidad Aguachiquénse a través de actividades de recreación, deporte y eventos culturales y sociales.Desarrollamos nuestra misión con un equipo de trabajo interdisciplinario y comprometido en la promoción y defensa de los espacios lúdico-recreativos e infundiendo el espíritu del respeto mutuo y servicio a la sociedad  por medio de obras sociales.</p>
            </div>
        </section>


        <!-- Carrusel destacado -->
        <section class="carousel-destacado">
            <h1>Lo Mejor de Nuestra Labor</h1>
            <br>
            <br>
            <br>
            <div class="swiper destacado-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/futbol.jpeg') }}"
                            alt="Evento Comunitario"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/futbol1.jpeg') }}"
                            alt="Entrega de Kits Escolares"></div>
                    <div class="swiper-slide"><img src="{{ asset('images/futbol2.jpeg') }}"
                            alt="Jornada Médica"></div>
                </div>
            </div>
        </section>

        </tbody>
    @endsection

    @section('footer')

    

    @endsection
