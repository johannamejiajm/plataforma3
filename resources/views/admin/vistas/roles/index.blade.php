@extends('admin.plantilla.layout')

@section('title', 'Administracion de Roles')

@section('content')

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


  <div class="body-wrapper-inner">
    <div class="container-fluid">
      <!--  Row 1 -->
      <div class="row">


        <div class="col-12 p-3">
            <h1 class="text-center">Roles</h1>
        </div>


        <div class="col-12 mb-4">
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal"> <i class="ti ti-plus"></i> Crear Rol</button>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-md-flex align-items-center">
                  <div>
                    <h4 class="card-title">Listado de Roles</h4>
                    <p class="card-subtitle">
                      Gestionar Roles
                    </p>
                  </div>

                </div>
            <div class="table-responsive mt-4">
                <table id="rolesTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Permisos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
                </div>
                </div>
            </div>

</div>
</div>
</div>
@include('admin.vistas.roles.modal-create')
@include('admin.vistas.roles.modal-edit')


@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        const table = $('#rolesTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('roles.list') }}",
            columns: [
                { data: 'name', name: 'name' },
                { data: 'permissions', name: 'permissions', orderable: false, searchable: false },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });

        // Crear
        $('#formCreate').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Creando rol...',
                didOpen: () => Swal.showLoading(),
                allowOutsideClick: false
            });

            $.ajax({
        url: "{{ route('roles.store') }}",
        method: "POST",
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            Swal.fire('¡Éxito!', data.success, 'success');
            $('#createModal').modal('hide');
            $('#formCreate')[0].reset();
             // Limpia clases y mensajes anteriores
             $('#formCreate .form-control, #formCreate .form-check-input').removeClass('is-invalid');
                $('#formCreate .invalid-feedback').remove();
            table.ajax.reload();

        },
        error: function(xhr) {
            if (xhr.status === 422) {
                let errores = xhr.responseJSON.errors;

                // Limpia clases y mensajes anteriores
                $('#formCreate .form-control, #formCreate .form-check-input').removeClass('is-invalid');
                $('#formCreate .invalid-feedback').remove();

                let mensajeGeneral = '';

                for (const campo in errores) {
                    const input = $(`#formCreate [name="${campo}"]`);
                    input.addClass('is-invalid');
                    const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
                    if (input.next('.invalid-feedback').length === 0) {
                        input.after(mensaje);
                    }
                    mensajeGeneral += `<p><strong>${campo}:</strong> ${errores[campo][0]}</p>`;
                }

                Swal.fire({
                    title: 'Errores de validación',
                    html: mensajeGeneral,
                    icon: 'error'
                });
            } else {
                // Otro error (500, 403, etc.)
                Swal.fire({
                    title: 'Error',
                    text: 'Ocurrió un error inesperado.',
                    icon: 'error'
                });
                console.error(xhr.responseText);
            }
        }
    });
        });

        // Editar
        $(document).on('click', '.editBtn', function() {
            const id = $(this).data('id');
            $.get(`/admin/roles/${id}/edit`, function(data) {

                $('#editRoleId').val(id).attr('value', id);
                $('#editName').val(data.role.name).attr('value', data.role.name);
                $('input[name="permissions_edit[]"]').prop('checked', false);
                data.role.permissions.forEach(p => {
                    $(`#perm_edit_${p.id}`).prop('checked', true);
                });
                $('#editModal').modal('show');
            });
        });

        // Guardar edición
        $('#formEdit').submit(function(e) {
        e.preventDefault();

        const form = $(this)[0];
        const formData = new FormData(form);
        const id = $('#editRoleId').val();

        Swal.fire({
            title: 'Actualizando rol...',
            didOpen: () => Swal.showLoading(),
            allowOutsideClick: false
        });

        $.ajax({
            url: `/admin/roles/${id}`,
            method: 'PUT',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(res) {
                $('#editModal').modal('hide');
                $('#formEdit')[0].reset();
                $('#rolesTable').DataTable().ajax.reload();

                Swal.fire('¡Éxito!', 'El rol ha sido actualizado correctamente.', 'success');
            },
            error: function(err) {
                let errores = err.responseJSON.errors;

                // Limpia clases y mensajes anteriores
                $('#formEdit .form-control, #formEdit .form-check-input').removeClass('is-invalid');
                $('#formEdit .invalid-feedback').remove();

                let mensajeGeneral = '';

                for (const campo in errores) {
                    const input = $(`#formEdit [name="${campo}"]`);
                    input.addClass('is-invalid');
                    const mensaje = `<div class="invalid-feedback">${errores[campo][0]}</div>`;
                    if (input.next('.invalid-feedback').length === 0) {
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

        // Eliminar
        $(document).on('click', '.deleteBtn', function() {
            const id = $(this).data('id');
            Swal.fire({
                title: '¿Eliminar rol?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'Cancelar'
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/roles/${id}`,
                        method: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function(data) {
                            Swal.fire('Eliminado', data.success, 'success');
                            table.ajax.reload();
                        }
                    });
                }
            });
        });

        $('#btnAddPermission').click(function () {
            const name = $('#new_permission').val().trim();
            if (!name) return;

            $.post("{{ route('permissions.store') }}", {
                name: name,
                _token: '{{ csrf_token() }}'
            }, function (res) {
                $('#permFeedback').removeClass('d-none').text(res.success);
                const newCheck = `
                    <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="permissions[]" value="${res.permission.name}" id="perm_${res.permission.id}" checked>
                        <label class="form-check-label" for="perm_${res.permission.id}">${res.permission.name}</label>
                    </div>
                    </div>`;
                $('#formCreate .row').append(newCheck);
                $('#new_permission').val('');
            }).fail(function (xhr) {
                Swal.fire('Error', xhr.responseJSON.message, 'error');
            });
        });
    });
    </script>
@endsection
