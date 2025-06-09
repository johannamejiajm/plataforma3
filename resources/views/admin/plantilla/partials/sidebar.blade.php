<aside class="left-sidebar">
  <div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="" class="text-nowrap logo-img">
      <img src="{{ asset('images/logotipo_pachos.png') }}" alt="logotipo" width="240" />
    </a>
    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
      <i class="ti ti-x fs-6"></i>
    </div>
  </div>
  <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
      <li class="nav-small-cap">
        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
        <span class="hide-menu">Generales</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('indexinicio') }}" aria-expanded="false">
          <i class="fa-solid fa-chart-line fa-xl"></i>
          <span class="hide-menu">Publico</span>
        </a>
      </li>
      @can('manage_publicaciones')
        <li class="sidebar-item">
          <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
            <div class="d-flex align-items-center gap-3">
              <span class="d-flex">
                <i class="fa-solid fa-newspaper fa-xl"></i>
              </span>
              <span class="hide-menu">Publicaciones</span>
            </div>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('admin.publicaciones.eventos.index') }}" aria-expanded="false" id="eventoPublicacionesLink">
              <i class="ti ti-circle"></i>
                <span class="hide-menu">Eventos</span>
              </a>
            </li>

            <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('admin.publicaciones.historias.index') }}" aria-expanded="false" id="historiaPublicacionesLink">
              <i class="ti ti-circle"></i>
                <span class="hide-menu">Historias</span>
              </a>
            </li>

            <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.publicaciones.noticias.index') }}" aria-expanded="false" id="noticiaPublicacionesLink">
              <i class="ti ti-circle"></i>
                <span class="hide-menu">Noticias</span>
              </a>
            </li>
          </ul>
        </li>
      @endcan
      @can('manage_artistas')
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('artistas.index') }}" aria-expanded="false" id="linkArtistas">
          <i class="fa-solid fa-palette fa-xl"></i>
          <span class="hide-menu">Artistas</span>
        </a>
      </li>
      @endcan
      @can('manage_eventos')
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('eventos.index') }}" aria-expanded="false" id="linkEventos">
          <i class="fa-solid fa-calendar-check fa-xl"></i>
          <span class="hide-menu">Eventos</span>
        </a>
      </li>
      @endcan
      @can('manage_donaciones')
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('donaciones.index') }}" aria-expanded="false" id="linkDonaciones">
          <i class="fa-solid fa-hand-holding-dollar fa-xl"></i>
          <span class="hide-menu">Donaciones</span>
        </a>
      </li>
      @endcan
      @can('manage_informacion')
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('quienessomos.indexadmin') }}" aria-expanded="false" id="linkInstitucional">
          <i class="fa-solid fa-address-card fa-xl"></i>
          <span class="hide-menu">Información institucional</span>
        </a>
      </li>
      @endcan
      @can('manage_contactos')
      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ route('admin.contactos') }}" aria-expanded="false" id="linkContactos">
          <i class="fa-solid fa-address-card fa-xl"></i>
          <span class="hide-menu">Contactos</span>
        </a>
      </li>
      @endcan
      @canany(['manage_users', 'manage_roles', 'manage_permisos'])
      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false" >
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex">
              <i class="fa-solid fa-shield-halved fa-xl"></i>
            </span>
            <span class="hide-menu">Seguridad</span>
          </div>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          @can('manage_users')
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('usuarios.index') }}" aria-expanded="false" id="usuariosLink">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Usuarios</span>
            </a>
          </li>
          @endcan
          @can('manage_roles')
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('roles.index') }}" aria-expanded="false" id="rolesLink">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Roles</span>
            </a>
          </li>
          @endcan
          @can('manage_permisos')
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('permisos.index') }}" aria-expanded="false" id="permisosLink">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Permisos</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcanany
    </ul>
  </nav>
</aside>
