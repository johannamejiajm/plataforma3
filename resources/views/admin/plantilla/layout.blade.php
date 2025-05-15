<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Mi Aplicación')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />

        @yield('css')

        <!-- Scripts -->
       {{--  @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

       @yield('css')
    </head>
    <body >


        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

            <!-- Page Heading -->

           {{--  @include('admin.plantilla.partials.header') --}}  {{-- Incluir el header --}}

            @include('admin.plantilla.partials.sidebar')


            <!-- Page Content -->
            <div class="body-wrapper">

                <header class="app-header">
                    <nav class="navbar navbar-expand-lg navbar-light">
                      <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                          <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                          </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-bell"></i>
                            <div class="notification bg-primary rounded-circle"></div>
                          </a>
                          <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                            <div class="message-body">
                              <a href="javascript:void(0)" class="dropdown-item">
                                Item 1
                              </a>
                              <a href="javascript:void(0)" class="dropdown-item">
                                Item 2
                              </a>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                          <li class="nav-item dropdown">
                            <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                              <div class="message-body">
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                  <i class="ti ti-user fs-6"></i>
                                  <p class="mb-0 fs-3">Mi Perfil</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                  <i class="ti ti-mail fs-6"></i>
                                  <p class="mb-0 fs-3">My Account</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                  <i class="ti ti-list-check fs-6"></i>
                                  <p class="mb-0 fs-3">My Task</p>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="d-block mx-3 mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-primary  d-block w-100">Cerrar Sesion</button>
                                </form>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </nav>
                </header>

                @yield('content')  {{-- Aquí se insertará el contenido de cada vista --}}
            </div>


            @includeIf('admin.plantilla.partials.footer')  {{-- Incluir el footer --}}



        </div>
        @include('admin.plantilla.partials.script')
        @yield('scripts')
    </body>
</html>
