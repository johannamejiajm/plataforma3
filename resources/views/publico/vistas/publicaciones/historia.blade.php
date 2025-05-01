@extends('publico.plantilla.plantilla')

@section('title')
  Historia
@endsection


@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
HISTORIA

@endsection


@section('tituloprincipal')
  
  <!-- <head>
  <meta charset="UTF-8">
  <H1 class="text-center">Historia de PACHO'S CLUB</H1>
  <title>Historia - Administración Deportiva</title>
  <link rel="stylesheet" href="estilos.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  

</head> -->

<!-- 
<div class="hero">
    <div class="overlay">
      <h1>Historia de la Administración Deportiva</h1>
    </div>
  </div> -->
@endsection

@section('contenido')
  
<!-- <div class="hero">
    <div class="overlay">
      <h1>Historia de la Administración Deportiva</h1>
    </div>
  </div> -->


  @if ($historias)

  @foreach ($historias as $historia)
  <div class="contenedor">
    <div class="contenido">
      <h2>{{ $historia->titulo }}</h2>
      <p>
      
{{ $historia->contenido }}
      </p>
      
    </div>
    <div class="contenedor">
      <h2 class="text-center mb-4">Momentos</h2>

      
        <div id="carruselImagenes" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false" data-bs-wrap="true">

          <div class="carousel-inner">

          @if ($historia->fotos)
              @foreach ($historia->fotos as $foto)
              <div class="carousel-item active">
                  <img src="{{ asset($foto->imagen)}}" class="d-block w-100" alt="{{ $historia->titulo }}">
                </div>
              @endforeach
          @endif
           
            <!-- <div class="carousel-item">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen11.jpg')}}" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen15.jpg')}}" class="d-block w-100" alt="Imagen 3">
            </div> -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  @endforeach
  
  @endif
  <section class="Origen-Historia">

  <h2>ORIGEN</h2>

    <div class="contenedor-gird">
      <div class="item">

            <a href="#" target="_blank">
              <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/im1.jpeg')}}" alt="Imagen 1">
            </a>
            <a href="#" target="_blank">
            
            PACHO'S CLUB CELEBRÓ DÍA A LOS ARTISTAS
            </a>
            <p>Octubre 28, 2024</p>
          </div>
      </div>  


  </section>

  <section class="galeria">

    <h2>HISTORIA DE EVENTOS</h2>
    

    <div class="contenedor-grid">
      <!-- Item 1 -->
      <div class="item">
        <a href="#" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración Día del Niño/Imagen1.jpg')}}" alt="Imagen 1">
        </a>
        <a href="#" target="_blank">
        Celebración Día del Niño
        </a>
        <p>abril 22, 2025</p>
      </div>
      <!-- Item 2 -->
      <div class="item">
        <a href="#" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/ancianato1.jpeg')}}" alt="Imagen 1">
        </a>
        <a href="#" target="_blank">
        Apoyo a los Abuelos del Ancianito
        </a>
        <p>abril 22, 2025</p>
      </div>
      <!-- Item 3 -->
      
      <div class="item">
        <a href="#" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen13.jpg')}}" alt="Imagen 1">
        </a>
        <a href="#" target="_blank">
        Apoyo a los Artistas de la Región
        </a>
        <p>abril 22, 2025</p>
      </div>
      <!-- Item 4 -->
      <div class="item">
        <a href="#" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo al deporte con campeonatos a la Niñez/Imagen17.jpg')}}" alt="Imagen 1">
        </a>
        <a href="#" target="_blank">
        
        Apoyo al deporte con campeonatos a la Niñez
        </a>
        <p>Octubre 28, 2024</p>
      </div>

      <div class="item">
        <a href="#" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Celebración de la Navidad con la niñez/Imagen21.jpg')}}" alt="Imagen 1">
        </a>
        <a href="#" target="_blank">
        
        Celebración de la Navidad con la niñez
        </a>
        <p>Octubre 28, 2024</p>
      </div>
      
    </div>
    <div class="boton-contenedor">
      <button>VER MÁS VIDEOS E IMÁGENES</button>
    </div>
  </section>




  
 












   <!-- VIDEOS -->
  <section class="galeria">
    <h2>Videos</h2>
    <div class="contenedor-grid">
      <!-- Item 1 -->
      <div class="item">
        <a href="https://www.youtube.com/watch?v=ZptJUAh8MXQ&t=1s&ab_channel=MiTvCanal20" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/mos1.png')}}" alt="Imagen 1">
        </a>
        <a href="https://www.youtube.com/watch?v=ZptJUAh8MXQ&t=1s&ab_channel=MiTvCanal20" target="_blank">
        PACHOS CLUB CELEBRARÁ DÍA DEL ARTISTA EN AGUACHICA
        </a>
        <p>abril 22, 2025</p>
      </div>
      <!-- Item 2 -->
      <div class="item">
        <a href="https://www.youtube.com/watch?v=U-Fy4YqSQ_g&ab_channel=MiTvCanal20" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/mos2.png')}}" alt="Imagen 1">
        </a>
        <a href="https://www.youtube.com/watch?v=U-Fy4YqSQ_g&ab_channel=MiTvCanal20" target="_blank">
        PACHO´S CLUB SUSPENDE CELEBRACIÓN DEL DÍA DEL ARTISTA
        </a>
        <p>abril 22, 2025</p>
      </div>
      <!-- Item 3 -->
      
      <div class="item">
        <a href="https://www.youtube.com/watch?v=XurGRi7FsMs&ab_channel=MiTvCanal20" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/mos4.png')}}" alt="Imagen 1">
        </a>
        <a href="https://www.youtube.com/watch?v=XurGRi7FsMs&ab_channel=MiTvCanal20" target="_blank">
        SE CELEBRÓ DÍA DEL ARTISTA EN AGUACHICA
        </a>
        <p>abril 22, 2025</p>
      </div>
      <!-- Item 4 -->
      <div class="item">
        <a href="https://www.youtube.com/watch?v=KDl8wjoGZCc&ab_channel=AguachicaOnline" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/mos3.png')}}" alt="Imagen 1">
        </a>
        <a href="https://www.youtube.com/watch?v=KDl8wjoGZCc&ab_channel=AguachicaOnline" target="_blank">
        
        CELEBRACION DEL DIA DEL ARTISTA (RESUMEN) FUNDACION PACHO´S CLUB
        </a>
        <p>Octubre 28, 2024</p>
      </div>

      <div class="item">
        <a href="https://fb.watch/zaGyY_hvUy/" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/{67F535C1-E6D7-44C4-B5EA-FB28A1FC6F6E}.jpg')}}" alt="Imagen 1">
        </a>
        <a href="https://fb.watch/zaGyY_hvUy/" target="_blank">
        
        LA AGUACHICA QUE QUEREMOS, PRESENTACION DE HECTOR HERNANDO GARCIA, NOVIEMBRE 5-22
        </a>
        <p>Octubre 28, 2024</p>
      </div>
      <div class="item">
        <a href="https://www.youtube.com/watch?v=7RkMu4XLL3E&pp=ygUvZnVuZGFjaW9uIHBhY2hvcyBjbHViIGFndWFjaGljYSBkaWEgZGVsIGFydGlzdGE%3D" target="_blank">
          <img src="{{ asset('assets/images/imageneshistoria/MAQUETACION/mos5.png')}}" alt="Imagen 1">
        </a>
        <a href="https://www.youtube.com/watch?v=7RkMu4XLL3E&pp=ygUvZnVuZGFjaW9uIHBhY2hvcyBjbHViIGFndWFjaGljYSBkaWEgZGVsIGFydGlzdGE%3D" target="_blank">
        
        PACHO'S CLUB CELEBRÓ DÍA A LOS ARTISTAS
        </a>
        <p>Octubre 28, 2024</p>
      </div>
    </div>
    <div class="boton-contenedor">
      <button>VER MÁS VIDEOS E IMÁGENES</button>
    </div>
  </section>

  





  <div class="contenedor-flex">


  <div class="contenedor">
    <div class="contenido">
      <h2>Historia sec 6 Celebración de la Navidad con la niñez </h2>
      <p>
        La administración deportiva ha existido como actividad desde la época de los pobladores primitivos, pasando por la organización de las olimpiadas de los antiguos griegos, hasta la administración moderna de organizaciones y empresas deportivas del siglo XXI, lo que muestra la importancia que ha tenido el deporte y las actividades físicas desde la prehistoria del hombre.
      </p>
      <p>
        Sin embargo, en esta época, la administración deportiva no se desarrollaba tan rápido como las administraciones de otras ramas económicas como agricultura, ganadería, pesca y otros sectores de producción industrial, tal vez, porque las prácticas deportivas y de esparcimiento las relacionaban con finalidades caritativas para el ocio o eran solo pasatiempos y no la administración con trabajo y productividad.
      </p>
      <p>
        Gumbertich, 2006, dice que desde las olimpiadas de 1984, en Los Ángeles, y la de 1988, en Seúl se marcó un claro giro hacia una nueva realidad económica de las olimpiadas y los demás deportes de competición. Es así como nace la idea de relacionar a la administración deportiva con el trabajo y la economía.
      </p>
      <p>
        Los roles de los Administradores Deportivos cada vez más vienen evolucionando paralelamente al crecimiento de los eventos deportivos, clubes, ligas, federaciones, organismos internacionales y empresas del sector, lo que obliga a una formación más profesionalizada y especializada.
      </p>
    </div>
  </div>


  <div class="columna">
  
    <h2 class="text-center mb-4">Galería de Imágenes</h2>
      <div id="carruselImagenes7" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen13.jpg')}}" class="d-block w-100" alt="Imagen 1">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen14.jpg')}}" class="d-block w-100" alt="Imagen 2">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen15.jpg')}}" class="d-block w-100" alt="Imagen 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes7" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes7" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
    
  </div>

  

 

</html>

@section('links')
 <link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">

@endsection





@endsection