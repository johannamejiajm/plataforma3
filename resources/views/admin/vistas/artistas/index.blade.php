{{-- @extends('admin.script.artistas.artistasscript') --}}

@extends('admin.plantilla.layout')

{{-- @section('titulo')
    <title>Artista</title>
@endsection --}}

@section('title')
    Artistas
@endsection

{{-- @section('tituloprincipal')
    <div class="row justify-content-center align-content-center text-center">
        <h2>MODULO ARTISTAS</h2>
    </div>
@endsection --}}

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
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
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


           <div class="row">
                 
           <div class="col-12 p-3">
                <h1 class="text-center">Modulo Artistas</h1>
            </div>

            @if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle me-2" style="font-size: 1.5rem;"></i>
        <div>
            {{ session('success') }}
        </div>
    </div>
@endif

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Listado de Artistas</h4>
                      <p class="card-subtitle">
                        Gestionar Artistas
                      </p>
                    </div>

                  </div>

                  <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered w-100" id="tablaArtistas">
                    <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Evento</th>
                <th>Identidad</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artistas as $artista)
                <tr>
                    <td>{{ $artista->artista_id }}</td>
                    <td>{{ $artista->nombre_evento ?? 'Sin evento' }}</td>
                    <td>{{ $artista->identidad }}</td>
                    <td>{{ $artista->nombre_artista }}</td>
                    <td>{{ $artista->email }}</td>
                    <td>{{ $artista->telefono }}</td>
                    <td>
                        @if ($artista->estado_artista == '1')
                            <span class="badge bg-success">Activo</span>
                        @else
                            <span class="badge bg-danger">Inactivo</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('artistas.cambiarEstado', $artista->artista_id) }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $artista->estado_artista == '1' ? 'btn-warning' : 'btn-success' }}">
                                {{ $artista->estado_artista == '1' ? 'Desactivar' : 'Activar' }}
                            </button>
                        </form>
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
         
       

   

</div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#tablaArtistas').DataTable({
            language:  {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            },
            responsive: true,
            autoWidth: false
        });
    });
</script>
@endsection



{{-- @section('contenido')

    <h1 class="my-4 text-center">Lista de Artistas</h1>

    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2" style="font-size: 1.5rem;"></i>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Evento</th>
                    <th>Identidad</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artistas as $artista)
                    <tr>
                        <td>{{ $artista->artista_id }}</td>
                        <td>{{ $artista->nombre_evento ?? 'Sin evento' }}</td>
                        <td>{{ $artista->identidad }}</td>
                        <td>{{ $artista->nombre_artista }}</td>
                        <td>{{ $artista->email }}</td>
                        <td>{{ $artista->telefono }}</td>
                        <td>
                            @if ($artista->estado_artista == '1')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{ route('artistas.cambiarEstado', $artista->artista_id) }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $artista->estado_artista == '1' ? 'btn-warning' : 'btn-success' }}">
                                    {{ $artista->estado_artista == '1' ? 'Desactivar' : 'Activar' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection --}}