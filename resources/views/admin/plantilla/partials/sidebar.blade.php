<aside class="left-sidebar">
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="../assets/images/logos/logo.svg" alt="" />
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
          <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
            <i class="ti ti-atom"></i>
            <span class="hide-menu">Panel Control</span>
          </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
              <div class="d-flex align-items-center gap-3">
                <span class="d-flex">
                  <i class="ti ti-layout-grid"></i>
                </span>
                <span class="hide-menu">Publicaciones</span>
              </div>

            </a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('eventos.index') }}" aria-expanded="false">
                      <i class="ti ti-circle"></i>
                      <span class="hide-menu">Eventos</span>
                    </a>
                  </li>

                  <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('historias.index') }}" aria-expanded="false">
                      <i class="ti ti-circle"></i>
                      <span class="hide-menu">Historias</span>
                    </a>
                  </li>

                  <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('noticias.index') }}" aria-expanded="false">
                      <i class="ti ti-circle"></i>
                      <span class="hide-menu">Noticias</span>
                    </a>
                  </li>
          {{--       <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                          <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Eventos</span>
                      </div>
                      <span class="hide-menu badge text-bg-secondary fs-1 py-1 me-10">Pro</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                          href="{{ route('eventos.index') }}">
                          <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                              <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Listado Eventos</span>
                          </div>
                          <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                          href="{{ route('eventos.create') }}">
                          <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                              <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Crear Evento</span>
                          </div>
                          <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                        </a>
                      </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                          <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Noticias</span>
                      </div>
                      <span class="hide-menu badge text-bg-secondary fs-1 py-1 me-10">Pro</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                          href="{{ route('noticias.index') }}">
                          <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                              <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Listado Noticias</span>
                          </div>
                          <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                          href="{{ route('noticias.create') }}">
                          <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                              <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Crear Noticia</span>
                          </div>
                          <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                        </a>
                      </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                      <div class="d-flex align-items-center gap-3">
                        <span class="d-flex">
                          <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Historias</span>
                      </div>
                      <span class="hide-menu badge text-bg-secondary fs-1 py-1 me-10">Pro</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                          href="{{ route('historias.index') }}">
                          <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                              <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Listado Historias</span>
                          </div>
                          <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link justify-content-between"
                          href="{{ route('historias.create') }}">
                          <div class="d-flex align-items-center gap-3">
                            <div class="round-16 d-flex align-items-center justify-content-center">
                              <i class="ti ti-circle"></i>
                            </div>
                            <span class="hide-menu">Crear Historia</span>
                          </div>
                          <span class="hide-menu badge text-bg-secondary fs-1 py-1">Pro</span>
                        </a>
                      </li>
                    </ul>
                </li> --}}
            </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('artistas.index') }}" aria-expanded="false">
            <i class="ti ti-atom"></i>
            <span class="hide-menu">Artistas</span>
          </a>
        </li>

      </ul>
    </nav>
</aside>
