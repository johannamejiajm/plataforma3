

@extends('admin.plantilla.layout')

@section('title', 'Administracion de Donaciones')

@section('content')


<!--  Header Start -->
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
              <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/?ref=376" target="_blank"
                class="btn btn-primary">Check Pro Template</a>
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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
      <!--  Header End -->

      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">

            <div class="col-12 p-3">
                <h1 class="text-center">Donaciones</h1>
            </div>

            <div class="col-12 mb-4">
                <div class=" d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                    <a href="{{ route('donaciones.index', ['estado' => 'todos']) }}" class="btn btn-primary w-100">Todos</a>
                    <a href="{{ route('donaciones.index', ['estado' => 'aprobado']) }}" class="btn btn-success w-100">Aprobados</a>
                    <a href="{{ route('donaciones.index', ['estado' => 'pendiente']) }}"class="btn btn-warning w-100">Pendientes</a>
                    <a href="{{ route('donaciones.index', ['estado' => 'denegado']) }}" class="btn btn-danger w-100">Denegados</a>
                </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Listado de Donaciones</h4>
                      <p class="card-subtitle">
                        Gestionar Donaciones
                      </p>
                    </div>

                  </div>

                  <div class="table-responsive mt-4">
                  <table id="tablaDonaciones" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tipo de Donación</th>
                        <th class="text-center">Donante</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Contacto</th>
                        <th class="text-center">Donación</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donaciones as $donacion)
                        <tr id="donacion-{{ $donacion->id }}" onclick="mostrarBotones({{ $donacion->id }})">
                            <td class="text-center">{{ $donacion->id }}</td>
                            <td class="text-center">{{ $donacion->tipoDonacion->tipo }}</td>
                            <td class="text-center">{{ $donacion->donante }}</td>
                            <td class="text-center">{{ $donacion->fecha }}</td>
                            <td class="text-center">{{ $donacion->contacto }}</td>
                            <td class="text-center">{{ $donacion->donacion }}</td>
                            <td class="text-center">
                                @if ($donacion->estado == 0)
                                    <div class="d-flex gap-2 d-md-block">
                                        <form action="{{ route('donaciones.update_estado', $donacion->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="estado" value="1">
                                            <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                                        </form>

                                        <form action="{{ route('donaciones.update_estado', $donacion->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="estado" value="2">
                                            <button type="submit" class="btn btn-danger btn-sm">Denegar</button>
                                        </form>


                                    </div>
                                @elseif ($donacion->estado == 1)
                                    Aprobado
                                @elseif($donacion->estado == 2)
                                    Denegado
                                @endif


                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-sm btn-danger btn-eliminar">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
                </div>
              </div>
            </div>

          </div>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by Juan Castro</p>
          </div>
        </div>
      </div>


@endsection


@section('scripts')

<script>
    $(document).ready(function() {
        const tabla = $('#tablaDonaciones').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });
    })
        </script>
@endsection
