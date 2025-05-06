@extends('admin.plantilla.layout')

@section('title', 'Administracion de permisos')

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
            <h1 class="text-center">Permisos</h1>
        </div>


        <div class="col-12 mb-4">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createModal"><i class="ti ti-plus"></i> Crear Permiso</button>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-md-flex align-items-center">
                  <div>
                    <h4 class="card-title">Listado de Permisos</h4>
                    <p class="card-subtitle">
                      Gestionar Permisos
                    </p>
                  </div>

                </div>
            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="permissionsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Creado</th>
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

<!-- Modal de edición -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="formEdit">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Permiso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label for="edit_name" class="form-label">Nombre</label>
                    <input type="text" id="edit_name" name="name" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal de creación -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="formCreate">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Permiso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    const table = $('#permissionsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('permissions.index') }}",
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'created_at' },
            { data: 'actions', orderable: false, searchable: false }
        ]
    });

    // Crear permiso
    $('#formCreate').submit(function(e) {
        e.preventDefault();
        Swal.fire({ title: 'Creando...', didOpen: () => Swal.showLoading(), allowOutsideClick: false });

        $.ajax({
            url: "{{ route('permissions.store') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire('Éxito', response.success, 'success');
                $('#formCreate')[0].reset();
                $('#createModal').modal('hide');
                table.ajax.reload();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let mensaje = '';
                    for (const campo in errors) {
                        mensaje += `<p><strong>${campo}:</strong> ${errors[campo][0]}</p>`;
                    }
                    Swal.fire({ title: 'Errores de validación', html: mensaje, icon: 'error' });
                } else {
                    Swal.fire('Error', 'Error desconocido.', 'error');
                    console.error(xhr.responseText);
                }
            }
        });
    });


    // Mostrar modal de edición
$('#permissionsTable').on('click', '.editBtn', function () {
    const id = $(this).data('id');
    $.get(`/admin/permissions/${id}`, function(data) {
        $('#edit_id').val(data.id);
        $('#edit_name').val(data.name);
        $('#editModal').modal('show');
    }).fail(function() {
        Swal.fire('Error', 'No se pudo cargar el permiso.', 'error');
    });
});

// Actualizar permiso
$('#formEdit').submit(function(e) {
    e.preventDefault();
    const id = $('#edit_id').val();
    const data = {
        _token: '{{ csrf_token() }}',
        _method: 'PUT',
        name: $('#edit_name').val()
    };

    Swal.fire({ title: 'Actualizando...', didOpen: () => Swal.showLoading(), allowOutsideClick: false });

    $.ajax({
        url: `/admin/permissions/${id}`,
        method: 'POST',
        data: data,
        success: function(response) {
            Swal.fire('Actualizado', response.success, 'success');
            $('#editModal').modal('hide');
            table.ajax.reload();
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                let mensaje = '';
                for (const campo in errors) {
                    mensaje += `<p><strong>${campo}:</strong> ${errors[campo][0]}</p>`;
                }
                Swal.fire({ title: 'Errores de validación', html: mensaje, icon: 'error' });
            } else {
                Swal.fire('Error', 'No se pudo actualizar el permiso.', 'error');
            }
        }
    });
});

    // Eliminar permiso
    $('#permissionsTable').on('click', '.deleteBtn', function () {
        const id = $(this).data('id');
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/permissions/${id}`,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        Swal.fire('Eliminado', response.success, 'success');
                        table.ajax.reload();
                    },
                    error: function() {
                        Swal.fire('Error', 'No se pudo eliminar el permiso.', 'error');
                    }
                });
            }
        });
    });
</script>
@endsection
