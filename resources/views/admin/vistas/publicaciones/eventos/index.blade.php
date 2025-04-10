@extends('admin.plantilla.layout')

@section('title', 'Administracion de Eventos')

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
          <!--  Row 1 -->
          <div class="row">

            <div class="col-12 p-3">
                <h1 class="text-center">Eventos</h1>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Listado de Eventos</h4>
                      <p class="card-subtitle">
                        Gestionar Eventos
                      </p>
                    </div>

                  </div>
                 {{--  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Assigned
                          </th>
                          <th scope="col" class="px-0 text-muted">Name</th>
                          <th scope="col" class="px-0 text-muted">
                            Priority
                          </th>
                          <th scope="col" class="px-0 text-muted text-end">
                            Budget
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-3.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">Sunil Joshi</h6>
                                <span class="text-muted">Web Designer</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Elite Admin</td>
                          <td class="px-0">
                            <span class="badge bg-info">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $3.9K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-5.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">
                                  Andrew McDownland
                                </h6>
                                <span class="text-muted">Project Manager</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Real Homes WP Theme</td>
                          <td class="px-0">
                            <span class="badge text-bg-primary">Medium</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $24.5K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-6.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">
                                  Christopher Jamil
                                </h6>
                                <span class="text-muted">SEO Manager</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">MedicalPro WP Theme</td>
                          <td class="px-0">
                            <span class="badge bg-warning">Hight</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $12.8K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-7.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">Nirav Joshi</h6>
                                <span class="text-muted">Frontend Engineer</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Hosting Press HTML</td>
                          <td class="px-0">
                            <span class="badge bg-danger">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $2.4K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-8.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">Micheal Doe</h6>
                                <span class="text-muted">Content Writer</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Helping Hands WP Theme</td>
                          <td class="px-0">
                            <span class="badge bg-success">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $9.3K
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div> --}}


                  <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered w-100" id="tablaPublicaciones">
                        <thead>
                            <tr>
                                <th class="px-0 text-muted text-center">Titulo</th>
                                <th class="px-0 text-muted text-center">Contenido</th>
                                <th class="px-0 text-muted text-center">Fecha y Hora Incio</th>
                                <th class="px-0 text-muted text-center">Fecha y Hora Final</th>
                                <th class="px-0 text-muted text-center">Estado</th>
                                <th class="px-0 text-muted text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cargado vía AJAX -->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        const tabla = $('#tablaPublicaciones').DataTable({
            ajax: '{{ route("publicaciones.data") }}',
            columns: [
                { data: 'titulo' },
                { data: 'contenido' },
                { data: 'fecha_inicial' },
                { data: 'fecha_final' },
                {
                    data: 'estado',
                    render: function(data) {
                        let clase = data === 'Activo' ? 'bg-success' : 'bg-danger';
                        return `<span class="badge ${clase}">${data}</span>`;
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    searchable: false,
                    render: function(data) {


                        return `
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="/admin/publicaciones/${data}/edit" class="btn btn-sm btn-warning text-white">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-danger btn-eliminar" data-id="${data}">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        `;
                    }
                }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });

        // Evento con SweetAlert2
        $('#tablaPublicaciones').on('click', '.btn-eliminar', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: '¿Quieres Cambiar el Estado?',
                text: "Esta acción cambiara para que no se muestre.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, Cambialo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('eventos.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            tabla.ajax.reload();
                            Swal.fire(
                            '¡Actualizado!',
                            `El estado fue cambiado a "${response.nuevo_estado}".`,
                            'success'
                            );
                        },
                        error: function() {
                            Swal.fire(
                                'Error',
                                'No se pudo eliminar la publicación.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
    </script>


@endsection
