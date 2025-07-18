<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo200px.png') }}" />

  <!-- Core Css -->
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css')  }}" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


 @yield('titulo')

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 @yield('links')
<style>
        /* Título blanco grande y fuerte */
.titulo-blanco {
    font-size: 3rem;
    font-weight: 900;
    color: #ffffff;
    text-transform: uppercase;
    font-family: 'Arial Black', 'Segoe UI', sans-serif;
    text-align: center;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    margin: 0;
}

/* Subtítulo amarillo cursiva y en negrita */
.subtitulo-amarillo {
    font-size: 2rem;
    font-style: italic;
    font-weight: bold;
    color: #FFC107; /* amarillo vibrante */
    text-align: center;
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.6);
    margin-top: 10px;
}
    </style>

</head>

<body>


  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ asset('images/logo400px.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <!-- ------------------------------------- -->
  <!-- Header Start -->
  <!-- ------------------------------------- -->
  <header class="header-fp p-0 w-100">
    <nav class="navbar navbar-expand-lg bg-primary-subtle">
      <div class="custom-container d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img">
          <img src="{{ asset('images/logo100px.png') }}" class="dark-logo" alt="Logo-Dark" />
          <img src="{{ asset('images/logo100px.png') }}" class="light-logo" alt="Logo-light" />
        </a>
        <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 gap-xl-7 gap-8 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('inicio.index') }}" id="inicio">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('quienessomos.index') }}" id="quienesSomos">Quienes Somos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary d-flex gap-2" href="{{ route('historia.index') }}" id="historia">Historia
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('publicaciones.indexpublicacionespublico') }}" id="publicaciones">Publicaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('publica.eventos.index') }}" id="eventos">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('artistas.create') }}" id="inscripcion">Inscripciones</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('artistas.activos') }}" id="artistas">Artistas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('donacionesindex.index') }}" id="donaciones">Donaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="{{ route('contantos.indexcontactos') }}" id="contactos">Contacto</a>
            </li>
          </ul>
          <div>
            <a href="{{ route('admin.publicaciones.eventos.index') }}"class="btn btn-primary py-8 px-9">Admin</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- ------------------------------------- -->
  <!-- Header End -->
  <!-- ------------------------------------- -->

  <!-- ------------------------------------- -->
  <!-- Responsive Sidebar Start -->
  <!-- ------------------------------------- -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <a href="/">
        <img src="{{ asset('images/logo100px.png') }}" alt="Logo-light" />
      </a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <a href="{{ route('inicio.index') }}" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
            Inicio
          </a>
        </li>

        <li class="mb-1">
          <a href="{{ route('quienessomos.index') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Quienes Somos
          </a>
        </li>

        <li class="mb-1">
          <a href="{{ route('historia.index') }}" class="px-0 fs-4 d-flex align-items-center justify-content-start gap-2 w-100 py-2 text-dark link-primary">
            Historia
          </a>
        </li>

        <li class="mb-1">
          <a href="{{ Route('publicaciones.indexpublicacionespublico') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary" >
            Publicaciones
          </a>
        </li>

        <li class="mb-1">
          <a href="{{ route('publica.eventos.index') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Eventos
          </a>
        </li>

        <li class="mb-1">
          <a href="{{ route('artistas.create') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Inscripciones
          </a>
        </li>
        <li class="mb-1">
          <a href="{{ route('artistas.activos') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Artistas
          </a>
        </li>
        <li class="mb-1">
          <a href="{{ route('donacionesindex.index') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Donación
          </a>
        </li>
        <li class="mb-1">
          <a href="{{ route('contantos.indexcontactos') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Contacto
          </a>
        </li>
        <li class="mt-3">
          <a href="{{ route('admin.publicaciones.eventos.index') }}" class="btn btn-primary w-100">Admin</a>
        </li>
      </ul>
    </div>
  </div>
  <!-- ------------------------------------- -->
  <!-- Responsive Sidebar End -->
  <!-- ------------------------------------- -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-0">
          <iframe width="100%" height="500" src="https://www.youtube.com/embed/wJkl3P5HnZw?si=n4EJ7JztrSZ3gWsc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <div class="main-wrapper overflow-hidden">
    <!-- ------------------------------------- -->
    <!-- banner Start -->
    <!-- ------------------------------------- -->
    <section class="bg-success position-relative p-0 m-0 hero-overlay" style="height: 300px; overflow: hidden;">
        <div class="hero" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                    background-image: url({{ asset('assets/images/imageneshistoria/MAQUETACION/im1.jpeg') }});
                    background-size: cover; background-position: center; z-index: 1;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
              background-color: rgba(0, 0, 0, 0.5); z-index: 2;"></div>

        <div class="custom-container position-relative z-2 text-white " style="z-index: 2; height: 100%;">
            <div class="row h-100">
              <div class="col-12 d-flex flex-column justify-content-center align-items-center text-center">
                <div>
                  <h1 style="color: white">@yield('tituloheader')</h1>
                  <p style="color: white">@yield('subtituloheader')</p>
                </div>
                <br>
                @yield('leyendaheader')
              </div>
            </div>
          </div>
          </div>
      </section>
    <!-- ------------------------------------- -->
    <!-- banner End -->
    <!-- ------------------------------------- -->

  </div>

  <!-- ------------------------------------- -->
  <!-- Header Start -->
  <!-- ------------------------------------- -->
  @yield('tituloprincipal')
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- ------------------------------------- -->
  <!-- Header End -->
  <!-- ------------------------------------- -->

  <!-- ------------------------------------- -->
  <!-- Main Start -->
  <!-- ------------------------------------- -->

  @yield('contenido')
  <!-- ------------------------------------- -->
  <!-- Main End -->
  <!-- ------------------------------------- -->


  <!-- ------------------------------------- -->
  <!-- Footer Start -->
  <!-- ------------------------------------- -->
  <footer>
    <div class="container-fluid">
      <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
        <div class="d-flex gap-3 align-items-center">
          <img src="{{ asset('assets/images/logos/senaimagen.png') }}" alt="icon">
          <p class="fs-4 mb-0">CentroAgroEmpresarial </p>
        </div>
        <div>
          <p class="mb-0">  #ADSO #Ficha2827316 #DesarrolloWeb #TalentoSENA #FormaciónConCalidad </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- ------------------------------------- -->
  <!-- Footer End -->
  <!-- ------------------------------------- -->

  <!-- Scroll Top -->
  <a href="javascript:void(0)" class="top-btn btn btn-primary d-flex align-items-center justify-content-center round-54 p-0 rounded-circle">
    <i class="ti ti-arrow-up fs-7"></i>
  </a>

  <script src="{{ asset('assets/js/vendor.min.js')}}"></script>

  <!-- Import Js Files -->
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
  <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
  <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>

  <!-- solar icons -->
  <script src="../assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../assets/js/frontend-landingpage/homepage.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @yield('script')
</body>

</html>
