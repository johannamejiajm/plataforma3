@extends('publico.script.publicaciones.inicioscript')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/inicio.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Roboto+Slab:ital@1&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Special+Gothic+Expanded+One&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('titulo')
    <title>Inicio</title>
@endsection

@section('tituloheader')
        <h1 class="titulo-blanco">FUNDACIÓN PACHO'S CLUB</h1>
@endsection

@section('subtituloheader')
    <p class="subtitulo-amarillo">"Construyendo sueños, inspirando vidas"</p>
@endsection

@section('contenido')
    <section class="hero-1">
        <div class="hero-content">
            <h1>Transformando Vidas a Través del Deporte</h1>
            <p>Esta fundación fomenta una educación deportiva de calidad, respaldada por el sector privado, dirigida a niños
                y niñas de comunidades vulnerables, desplazadas y con escasos recursos en el municipio.</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets/images/imagenes-inicio/pachos-lideres.jpg') }}"
                alt="Imagen representativa de la labor de tu fundación">
        </div>
    </section>

    <div class="contenedor">
        <h2 class="text-center mb-4">GALERIA</h2>
        <div id="carruselImagenes1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos.jpg') }}" class="d-block w-100 img-fluid"
                        alt="Imagen 1">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-aguachica-fc.jpg') }}" class="d-block w-100"
                        alt="Imagen 2">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-comfacesar.jpg') }}" class="d-block w-100"
                        alt="Imagen 3">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/ancianato3.jpeg') }}"
                        class="d-block w-100" alt="Imagen 5">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/ancianato4.jpeg') }}"
                        class="d-block w-100" alt="Imagen 6">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-gamarra.jpg') }}" class="d-block w-100"
                        alt="Imagen 7">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-juanamaya.jpg') }}" class="d-block w-100"
                        alt="Imagen 8">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-n1.jpg') }}" class="d-block w-100"
                        alt="Imagen 9">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-pasion-talento.jpg') }}" class="d-block w-100"
                        alt="Imagen 10">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-pasion-talento2.jpg') }}"
                        class="d-block w-100" alt="Imagen 11">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/escuela-pasion-talento3.jpg') }}"
                        class="d-block w-100" alt="Imagen 12">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato.jpg') }}" class="d-block w-100"
                        alt="Imagen 13">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-2.jpg') }}" class="d-block w-100"
                        alt="Imagen 14">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-3.jpg') }}" class="d-block w-100"
                        alt="Imagen 15">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-4.jpg') }}" class="d-block w-100"
                        alt="Imagen 16">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-5.jpg') }}" class="d-block w-100"
                        alt="Imagen 17">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-6.jpg') }}" class="d-block w-100"
                        alt="Imagen 18">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-7.jpg') }}" class="d-block w-100"
                        alt="Imagen 19">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-8.jpg') }}" class="d-block w-100"
                        alt="Imagen 20">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-9.jpg') }}" class="d-block w-100"
                        alt="Imagen 21">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-10.jpg') }}" class="d-block w-100"
                        alt="Imagen 22">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-11.jpg') }}" class="d-block w-100"
                        alt="Imagen 23">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-12.jpg') }}" class="d-block w-100"
                        alt="Imagen 24">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-13.jpg') }}" class="d-block w-100"
                        alt="Imagen 25">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-14.jpg') }}" class="d-block w-100"
                        alt="Imagen 26">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-15.jpg') }}" class="d-block w-100"
                        alt="Imagen 27">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos-campeonato-16.jpg') }}" class="d-block w-100"
                        alt="Imagen 28">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/01.jpg') }}" class="d-block w-100" alt="Imagen 29">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/02.jpg') }}" class="d-block w-100" alt="Imagen 30">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/03.jpg') }}" class="d-block w-100" alt="Imagen 31">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/banda-camposerrano.jpg') }}" class="d-block w-100"
                        alt="Imagen 32">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/club-olimpico.jpg') }}" class="d-block w-100"
                        alt="Imagen 33">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imagenes-inicio/pachos2.jpg') }}" class="d-block w-100"
                        alt="Imagen 28">
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

    <br>
    <div class="text-center my-4 centrar-noticias">
        <h2>EVENTOS RELEVANTES</h2>
    </div>

    <section class="Origen-Historia">
        <div class="contenedor-gird">
            @foreach ($publicaciones as $publicacion)
                <div class="card-historia">
                    <div class="card-historia-img" data-bs-toggle="modal" style="cursor: pointer;">
                        @if ($publicacion->fotos->isNotEmpty())
                            <img src="{{ asset($publicacion->fotos->first()->imagen) }}" class="card-img-top"
                                alt="Imagen de {{ $publicacion->titulo }}">
                        @endif
                    </div>
                    <div class="card-historia-body">
                        <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                        <a href="{{ route('publicaciones.indexpublicacionespublico') }}" class="btn btn-outline-primary mt-2">Ver todos los
                            eventos</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

     <div class="text-center my-4 centrar-noticias">
        <h2>NOTICIAS RELEVANTES</h2>
    </div>
    <section class="Origen-Historia">
        <div class="contenedor-gird">
            @foreach ($noticias as $noticia)
                <div class="card-historia">
                    <div class="card-historia-img" data-bs-toggle="modal" style="cursor: pointer;">
                        @if ($noticia->fotos->isNotEmpty())
                            <img src="{{ asset($noticia->fotos->first()->imagen) }}" class="card-img-top"
                                alt="Imagen de {{ $noticia->titulo }}">
                        @endif
                    </div>
                    <div class="card-historia-body">
                        <h5 class="card-title">{{ $noticia->titulo }}</h5>
                        <a href="{{ route('publicaciones.indexpublicacionespublico') }}"
                            class="btn btn-outline-primary mt-2">Ver todas las noticias</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <div class="text-center my-4 centrar-noticias">
        <h2>HISTORIAS RELEVANTES</h2>
    </div>
    <section class="Origen-Historia">
        <div class="contenedor-gird">
            @foreach ($eventos as $evento)
                <div class="card-historia">
                    <div class="card-historia-img" data-bs-toggle="modal" style="cursor: pointer;">
                        @if ($evento->fotos->isNotEmpty())
                            <img src="{{ asset($evento->fotos->first()->imagen) }}" class="card-img-top"
                                alt="Imagen de {{ $evento->titulo }}">
                        @endif
                    </div>
                    <div class="card-historia-body">
                        <h5 class="card-title">{{ $evento->titulo }}</h5>
                        <a href="{{ route('historia.index') }}" class="btn btn-outline-primary mt-2">Ver todas las historias</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>



    <section class="llamada-a-la-accion-final">
        <h2>Únete a Nuestra Causa</h2>
        <p>"Creemos en un mundo donde cada pequeño acto de amor puede cambiar una vida. En nuestra fundación, trabajamos
            cada día con el corazón, porque transformar realidades empieza con la voluntad de ayudar. Juntos, podemos ser el
            cambio que tanto necesitamos."</p>
        <div class="botones-finales">
            <a href="{{ route('donacionesindex.index') }}" class="button primary">Donar</a>
            <a href="{{ route('contantos.indexcontactos') }}" class="button outline">Contactos</a>
        </div>
    </section>
@endsection

