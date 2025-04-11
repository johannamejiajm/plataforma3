<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />

  <!-- Core Css -->
  <link rel="stylesheet" href="../assets/css/styles.css" />

 @yield('titulo')
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="../assets/libs/owl.carousel/dist/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


  <!-- Preloader -->
  <div class="preloader">
    <img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
   <!-- ------------------------------------- -->
  <!-- Header Start -->
  <!-- ------------------------------------- -->
  <header class="header-fp p-0 w-100">
    <nav class="navbar navbar-expand-lg bg-primary-subtle py-2 py-lg-10">
      <div class="custom-container d-flex align-items-center justify-content-between">
        <a href="../main/frontend-landingpage.html" class="text-nowrap logo-img">
          <img src="../assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
          <img src="../assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
        </a>
        <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 gap-xl-7 gap-8 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Quienes somos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary d-flex gap-2" href="#">Historia
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Publicaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Inscripciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Artistas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Donaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 px-6 fw-bold text-dark link-primary" href="#">Contacto</a>
            </li>
          </ul>
          <div>
            <a href="#" class="btn btn-primary py-8 px-9">Admin</a>
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
      <a href="#">
        <img src="../assets/images/logos/dark-logo.svg" alt="Logo-light" />
      </a>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <a href="#" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
            Inicio
          </a>
        </li>

        <li class="mb-1">
          <a href="#" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Quienes Somos
          </a>
        </li>

        <li class="mb-1">
          <a href="#" class="px-0 fs-4 d-flex align-items-center justify-content-start gap-2 w-100 py-2 text-dark link-primary">
            Historia
          </a>
        </li>

        <li class="mb-1">
          <a href="{{ Route('publicaciones.index') }}" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary" >
            Publicaciones
          </a>
        </li>

        <li class="mb-1">
          <a href="#" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Eventos
          </a>
        </li>

        <li class="mb-1">
          <a href=".#" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Inscripciones
          </a>
        </li>
        <li class="mb-1">
          <a href=".#" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Artistas
          </a>
        </li>
        <li class="mb-1">
          <a href=".#" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Donación
          </a>
        </li>
        <li class="mb-1">
          <a href=".#" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            Contacto
          </a>
        </li>
        <li class="mt-3">
          <a href="#" class="btn btn-primary w-100">Admin</a>
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
    <Section class="bg-primary-subtle pt-7 py-lg-0 py-7">
      <div class="custom-container">
        <div class="row justify-content-center pt-lg-5 mb-4">
          <div class="col-lg-8">
            <h1 class="text-link-color fw-bolder text-center fs-13 mb-0 pt-lg-2">
              PACHOS CLUB
            </h1>
            <br> <h2 class="text-center text-primary fw-bolder fs-10 mb-0 pt-lg-2">FUNDACIÓN</h2>
          </div>
        </div>
        <div class="row align-items-end mb-3">
          <div class="col-lg-6">
            <div class="d-flex justify-content-center align-items-center gap-9">
            </div>
          </div>
         
        </div>
        
      </div>
    </Section>
    <!-- ------------------------------------- -->
    <!-- banner End -->
    <!-- ------------------------------------- -->

  </div>


  @yield('tituloprincipal')


  @yield('contenido')
  <!-- ------------------------------------- -->
  <!-- Footer Start -->
  <!-- ------------------------------------- -->
  <footer>
    <div class="container-fluid">
      <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
        <div class="d-flex gap-3 align-items-center">
          <img src="../assets/images/logos/favicon.png" alt="icon">
          <p class="fs-4 mb-0">All rights reserved by flexy. </p>
        </div>
        <div>
          <p class="mb-0">Produced by <a target="_blank" href="https://www.wrappixel.com/" class="text-primary link-primary">Wrappixel</a>.</p>
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

  <script src="../assets/js/vendor.min.js"></script>
  <!-- Import Js Files -->
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
  <script src="../assets/js/theme/app.init.js"></script>
  <script src="../assets/js/theme/theme.js"></script>
  <script src="../assets/js/theme/app.min.js"></script>

  <!-- solar icons -->
  <script src="../assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../assets/js/frontend-landingpage/homepage.js"></script>
</body>

</html>