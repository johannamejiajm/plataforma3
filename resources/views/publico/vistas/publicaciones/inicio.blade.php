@extends('publico.script.publicaciones.inicioscript')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('tituloheader')
    <div class="hero-title">
        <h1 class="hero-title">FUNDACIÓN PACHO'S CLUB</h1>
        <p class="subtitulo-amarillo">"Construyendo Sueños, inspirando vidas"</p>
    </div>
@endsection

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

@section('contenido')
    <section class="hero-1">
        <div class="hero-content">
            <h1>Transformando Vidas a Través del Deporte</h1>
            <p>Esta fundación fomenta una educación deportiva de calidad, respaldada por el sector privado, dirigida a niños
                y niñas de comunidades vulnerables, desplazadas y con escasos recursos en el municipio.</p>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/ancianato1.jpeg') }}"
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
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/ancianato3.jpeg') }}"
                        class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/ancianato4.jpeg') }}"
                        class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen6.jpg') }}"
                        class="d-block w-100" alt="Imagen 3">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo al deporte con campeonatos a la Niñez/Imagen17.jpg') }}"
                        class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo al deporte con campeonatos a la Niñez/Imagen18.jpg') }}"
                        class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo al deporte con campeonatos a la Niñez/Imagen19.jpg') }}"
                        class="d-block w-100" alt="Imagen 3">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración de la Navidad con la niñez/Imagen21.jpg') }}"
                        class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración de la Navidad con la niñez/Imagen22.jpg') }}"
                        class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración Día del Niño/Imagen1.jpg') }}"
                        class="d-block w-100" alt="Imagen 3">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración Día del Niño/Imagen2.jpg') }}"
                        class="d-block w-100" alt="Imagen 3">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración Día del Niño/Imagen3.jpg') }}"
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
        <h2 class="mb-4">HISTORIAS</h2>
        <div class="row">
            @foreach ($publicaciones as $publicacion)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($publicacion->fotos->isNotEmpty())
                            <img src="{{ asset($publicacion->fotos->first()->imagen) }}" class="card-img-top"
                                alt="Imagen de {{ $publicacion->titulo }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $publicacion->titulo }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('historia.index') }}" class="btn btn-outline-primary mt-2">Ver todas las noticias</a>
        </div>
    </div>

    <div class="container my-4">
        <h2 class="mb-4">PUBLICACIONES</h2>
        <div class="row">
            @foreach ($noticias as $noticia)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($noticia->fotos->isNotEmpty())
                            <img src="{{ asset($noticia->fotos->first()->imagen) }}" class="card-img-top"
                                alt="Imagen de {{ $noticia->titulo }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $noticia->titulo }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('publicaciones.indexpublicacionespublico') }}" class="btn btn-outline-primary mt-2">Ver
                todas las publicaciones</a>
        </div>
    </div>

    <div class="container my-4">
        <h2 class="mb-4">EVENTOS</h2>
        <div class="row">
            @foreach ($eventos as $evento)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($evento->fotos->isNotEmpty())
                            <img src="{{ asset($evento->fotos->first()->imagen) }}" class="card-img-top"
                                alt="Imagen de {{ $evento->titulo }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $evento->titulo }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('publica.eventos.index') }}" class="btn btn-outline-primary mt-2">Ver todos los eventos</a>
        </div>
    </div>



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
    <script>
        $(document).ready(function() {
            $('#inicio').addClass('active');
        });
    </script>
@endsection
