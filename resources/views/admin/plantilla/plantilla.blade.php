<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('titulo')
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap.min.css" />
  
  @yield('links')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    <div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
        <a class="d-flex justify-content-center" href="https://www.wrappixel.com/" target="_blank">
          <img src="{{ asset('assets/images/logos/logo-wrappixel.svg')}}" alt="" width="150">
        </a>

        <div class="d-none d-xl-flex align-items-center gap-3">
          <a href="https://support.wrappixel.com/"
            class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
            <i class="ti ti-lifebuoy fs-5"></i>
            Support
          </a>
          <a href="https://www.wrappixel.com/"
            class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
            <i class="ti ti-gift fs-5"></i>
            Templates
          </a>
          <a href="https://www.wrappixel.com/hire-us/"
            class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
            <i class="ti ti-briefcase fs-5"></i>
            Hire Us
          </a>
        </div>
      </div>

      <div class="d-lg-flex align-items-center gap-2">
        <div class="d-flex align-items-center justify-content-center gap-2">
          <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ asset('assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">My Profile</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-mail fs-6"></i>
                <p class="mb-0 fs-3">My Account</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-list-check fs-6"></i>
                <p class="mb-0 fs-3">My Task</p>
              </a>
              <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <aside class="left-sidebar">
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('assets/images/logos/logo.svg')}}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Publicaciones</span>
              </a>
            </li>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="././././admin/" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Artistas</span>
              </a>
            </li>
            </li>
          
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('donaciones.index') }}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Donaciones</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.contactos') }}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">contactos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">Front</span>
                </div>
                <span class="hide-menu badge text-bg-secondary fs-1 py-1 me-10">Pro</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a class="sidebar-link justify-content-between" target="_blank"
                    href="https://bootstrapdemos.wrappixel.com/flexy/dist/main/frontend-landingpage.html">
                    <div class="d-flex align-items-center gap-3">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-circle"></i>
                      </div>
                      <span class="hide-menu">Homepage</span>
                    </div>
                    <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
    </aside>
    <div class="body-wrapper">
      <header class="app-header">

        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
              </li>
            </ul>
          </div>

        </nav>
        <div class="row w-100 d-flex justify-content-center">
            <div class="mx-auto text-center">
                @yield('tituloprincipal')
            </div>
        </div>
      </header>
      <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="justify-items-center text-center align-content-center">
                @yield('contenido')
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
  <script src="{{ asset('assets/js/app.min.js')}}"></script>
  <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.min.js"></script>
  @yield('scriptadicionales')
  @yield('script')

</body>

</html>
