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
  <div class="contenedor">
    <div class="contenido">
      <h2>Historia sec 1</h2>
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
    <div class="contenedor">
      <h2 class="text-center mb-4">Galería de Imágenes</h2>

        <div id="carruselImagenes" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen10.jpg')}}" class="d-block w-100" alt="Imagen 1">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen11.jpg')}}" class="d-block w-100" alt="Imagen 2">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen15.jpg')}}" class="d-block w-100" alt="Imagen 3">
            </div>
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
  </div>

 

  
  <div class="contenedor">
    <div class="contenido">
      <h2>Historia sec 2 Celebración Día del Niño </h2>
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

    <div class="contenedor">
      <h2 class="text-center mb-4">Galería de Imágenes</h2>

        <div id="carruselImagenes2" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen6.jpg')}}" class="d-block w-100" alt="Imagen 4">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen14.jpg')}}" class="d-block w-100" alt="Imagen 5">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen15.jpg')}}" class="d-block w-100" alt="Imagen 6">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  

  <div class="contenedor">
    <div class="contenido">
      <h2>Historia sec 3 Apoyo a los Abuelos del Ancianito </h2>
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
    <div class="contenedor">
      <h2 class="text-center mb-4">Galería de Imágenes</h2>

        <div id="carruselImagenes3" class="carousel slide" data-bs-ride="carousel">
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
          <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes3" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes3" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  </div>
 

  <div class="contenedor">
    <div class="contenido">
      <h2>Historia sec 4 Apoyo a los Artistas de la Región </h2>
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
    <div class="contenedor">
      <h2 class="text-center mb-4">Galería de Imágenes</h2>

        <div id="carruselImagenes4" class="carousel slide" data-bs-ride="carousel">
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
          <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes4" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes4" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  
  
    
 
    
  
  <div class="contenedor">
    <div class="contenido">
      
      <h2>Historia sec 5 Apoyo al deporte con campeonatos a la Niñez</h2>
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
    <div class="contenedor">
      <h2 class="text-center mb-4">Galería de Imágenes</h2>

        <div id="carruselImagenes5" class="carousel slide" data-bs-ride="carousel">
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
          <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes5" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes5" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  

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

    <div class="contenedor">
      <h2 class="text-center mb-4">Galería de Imágenes</h2>

        <div id="carruselImagenes6" class="carousel slide" data-bs-ride="carousel">
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
          <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes6" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes6" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</html>

@section('links')
 <link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">

@endsection





@endsection