@extends('admin.plantilla.layout')

@section('title', 'Administracion de Noticias')

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
                <h1 class="text-center">Noticias</h1>
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCrearNoticia">
                    <i class="ti ti-plus"></i> Nueva Noticia
                </button>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Listado de Noticias</h4>
                      <p class="card-subtitle">
                        Gestionar Noticias
                      </p>
                    </div>

                  </div>

                  <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered w-100" id="tablaPublicacionesNoticia">
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

      <div class="modal fade" id="modalCrearNoticia" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content p-4">
            <form id="formCrearNoticia"  enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crear Nueva Historia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body row g-3">

                <input type="hidden" name="idtipo" value="1"> <!-- Ajusta el valor dinámicamente si es necesario -->

                <div class="col-md-6">
                  <label for="titulo" class="form-label">Título</label>
                  <input type="text" class="form-control" name="titulo" >

                </div>

                <div class="col-md-6">
                  <label for="estado" class="form-label">Estado</label>
                  <select name="estado" class="form-select" >
                    <option value="" selected disabled>--Seleccione--</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="contenido" class="form-label">Contenido</label>
                  <textarea class="form-control" name="contenido" rows="3" ></textarea>
                </div>

                <div class="col-md-6">
                  <label for="fechainicial" class="form-label">Fecha y hora inicial</label>
                  <input type="datetime-local" class="form-control" name="fechainicial" >
                </div>

                <div class="col-md-6">
                  <label for="fechafinal" class="form-label">Fecha y hora final</label>
                  <input type="datetime-local" class="form-control" name="fechafinal" >
                </div>

                <div class="col-12">
                  <label for="imagenes" class="form-label">Imágenes (máx. 5)</label>
                  <input type="file" name="imagenes[]" class="form-control" accept="image/*" multiple >
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalEditarNoticia" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content p-4">
            <form id="formEditarNoticia" enctype="multipart/form-data">
              <input type="hidden" name="id" id="editar_id">
              <div class="modal-header">
                <h5 class="modal-title">Editar Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body row g-3">
                <input type="hidden" name="idtipo" value="1"> <!-- Ajusta el valor dinámicamente si es necesario -->

                <div class="col-md-6">
                  <label for="editar_titulo" class="form-label">Título</label>
                  <input type="text" class="form-control" name="titulo" id="editar_titulo">
                </div>

                <div class="col-md-6">
                  <label for="editar_estado" class="form-label">Estado</label>
                  <select name="estado" class="form-select" id="editar_estado">
                    <option value="" selected disabled>--Seleccione--</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>
                </div>

                <div class="col-12">
                  <label for="editar_contenido" class="form-label">Contenido</label>
                  <textarea class="form-control" name="contenido" rows="3" id="editar_contenido"></textarea>
                </div>

                <div class="col-md-6">
                  <label for="editar_fechainicial" class="form-label">Fecha y hora inicial</label>
                  <input type="datetime-local" class="form-control" name="fechainicial" id="editar_fechainicial">
                </div>

                <div class="col-md-6">
                  <label for="editar_fechafinal" class="form-label">Fecha y hora final</label>
                  <input type="datetime-local" class="form-control" name="fechafinal" id="editar_fechafinal">
                </div>

                <div class="col-12">
                  <label class="form-label">Imágenes actuales:</label>
                  <div id="imagenes_actuales" class="d-flex gap-2 flex-wrap"></div>
                </div>

                <div class="col-12">
                  <label for="editar_imagenes" class="form-label">Reemplazar Imágenes (máx. 5)</label>
                  <input type="file" name="imagenes[]" class="form-control" accept="image/*" multiple id="editar_imagenes">
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        const tabla = $('#tablaPublicacionesNoticia').DataTable({
            ajax: '{{ route("publicaciones.noticias") }}',
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
                                <button class="btn btn-sm btn-warning text-white btn-editar" data-id="${data}">
                                    <i class="ti ti-pencil"></i>
                                </button>
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
        $('#tablaPublicacionesNoticia').on('click', '.btn-eliminar', function() {
            const id = $(this).data('id');

            Swal.fire({
                title: '¿Quieres Cambiar el Estado Noticia?',
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
                        url: `{{ route('noticias.destroy', ':id') }}`.replace(':id', id),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            tabla.ajax.reload();
                            Swal.fire(
                            '¡Actualizado!',
                            `El estado de la Noticia fue cambiado a "${response.nuevo_estado}".`,
                            'success'
                            );
                        },
                        error: function() {
                            Swal.fire(
                                'Error',
                                'No se pudo eliminar la publicación de Noticia.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });

    $('#formCrearNoticia').submit(function(e) {
    e.preventDefault();

    const form = $(this)[0];

    const formData = new FormData(form);

    Swal.fire({
        title: 'Creando Noticia...',
        didOpen: () => Swal.showLoading(),
        allowOutsideClick: false
    });

    $.ajax({
        url: '{{ route("noticias.store") }}',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(res) {
            console.log(res)
            $('#modalCrearNoticia').modal('hide');
            $('#formCrearNoticia')[0].reset();
            $('#tablaPublicacionesNoticia').DataTable().ajax.reload();

            Swal.fire('¡Éxito!', 'La Noticia ha sido creada correctamente.', 'success');
        },
        error: function(err) {
            let errores = err.responseJSON.errors;

        // Limpia clases y mensajes anteriores
        $('#formCrearNoticia .form-control, #formCrearNoticia .form-select, #formCrearNoticia textarea').removeClass('is-invalid');
        $('#formCrearNoticia .invalid-feedback').remove();

        // Variable para fallback general
        let mensajeGeneral = '';

        // Recorremos los errores para mostrarlos
        for (const campo in errores) {
        const input = $(`[name="${campo}"]`);

        // Agregamos clase de error
        input.addClass('is-invalid');

        // Mostramos mensaje debajo del input
        if (input.length > 0) {
        const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
        input.after(mensaje);
        }

        // También acumulamos para el mensaje general (por si quieres mostrar en SweetAlert2 también)
        mensajeGeneral += `<p><strong>${campo}:</strong> ${errores[campo][0]}</p>`;
        }

        Swal.fire({
            title: 'Errores de validación',
            html: mensajeGeneral,
            icon: 'error'
        });
        }

    });
});



$('#tablaPublicacionesNoticia').on('click', '.btn-editar', function() {
    const id = $(this).data('id');

    $.get(`{{ route('noticias.show', ':id') }}`.replace(':id', id), function(data) {

        $('#formEditarNoticia .form-control, #formEditarNoticia .form-select, #formEditarNoticia textarea').removeClass('is-invalid');
        $('#formEditarNoticia .invalid-feedback').remove();

        $('#editar_id').val(data.id).trigger('change');
        $('#editar_id').attr('value', data.id);

        $('#editar_titulo').val(data.titulo).trigger('change');
        $('#editar_titulo').attr('value', data.titulo);

        $('#editar_contenido').val(data.contenido).trigger('change');
        $('#editar_contenido').attr('value', data.contenido);

        $('#editar_fechainicial').val(data.fechainicial).trigger('change');
        $('#editar_fechainicial').attr('value', data.fechainicial);

        $('#editar_fechafinal').val(data.fechafinal).trigger('change');
        $('#editar_fechafinal').attr('value', data.fechafinal);

        $('#editar_estado').val(data.estado).trigger('change');
        $('#editar_estado').attr('value', data.estado);

        // Limpiar y mostrar imágenes actuales
        const contenedor = $('#imagenes_actuales');
        contenedor.empty();
        data.imagenes.forEach(img => {
            contenedor.append(`
                <div class="position-relative">
                    <img src="/${img.ruta}" class="img-thumbnail" style="width: 100px; height: 100px;">
                </div>
            `);
        });

        $('#modalEditarNoticia').modal('show');
    });
});

$('#formEditarNoticia').submit(function(e) {
    e.preventDefault();

    const id = $('#editar_id').val();
    const form = $(this)[0];
    const formData = new FormData(form);

    Swal.fire({
        title: 'Actualizando Noticia...',
        didOpen: () => Swal.showLoading(),
        allowOutsideClick: false
    });

    $.ajax({
        url: `{{ route('noticias.update', ':id') }}`.replace(':id', id),
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-HTTP-Method-Override': 'PUT' // Laravel espera PUT para update
        },
        success: function(res) {
            $('#modalEditarNoticia').modal('hide');
            $('#formEditarNoticia')[0].reset();
            $('#tablaPublicacionesNoticia').DataTable().ajax.reload();

            Swal.fire('¡Actualizado!', 'La Noticia ha sido modificado correctamente.', 'success');
        },
        error: function(err) {
            let errores = err.responseJSON.errors;

            // Limpia clases y mensajes anteriores
            $('#formEditarNoticia .form-control, #formEditarNoticia .form-select, #formEditarNoticia textarea').removeClass('is-invalid');
            $('#formEditarNoticia .invalid-feedback').remove();

            // Variable para fallback general
            let mensajeGeneral = '';

            // Recorremos los errores para mostrarlos
            for (const campo in errores) {
                const input = $(`#formEditarNoticia [name="${campo}"]`);

                input.addClass('is-invalid');

                if (input.length > 0) {
                    const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
                    input.after(mensaje);
                }

                mensajeGeneral += `<p><strong>${campo}:</strong> ${errores[campo][0]}</p>`;
            }

            Swal.fire({
                title: 'Errores de validación',
                html: mensajeGeneral,
                icon: 'error'
            });
        }
    });
});



    </script>


@endsection
