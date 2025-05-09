@extends('admin.plantilla.layout')

@section('title', 'Administracion de Usuarios')

@section('content')



  <div class="body-wrapper-inner">
    <div class="container-fluid">
      <!--  Row 1 -->
      <div class="row">


        <div class="col-12 p-3">
            <h1 class="text-center">Usuarios</h1>
        </div>


        <div class="col-12 mb-4">
            {{-- Botón para abrir el modal de creación --}}
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fas fa-plus"></i> Nuevo Usuario
            </button>
        </div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="d-md-flex align-items-center">
                  <div>
                    <h4 class="card-title">Listado de Usuarios</h4>
                    <p class="card-subtitle">
                      Gestionar Usuarios
                    </p>
                  </div>

                </div>
            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
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


{{-- Modal de crear --}}
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="formCreate">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Correo</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Rol</label>
                        <select name="role" class="form-control">
                            <option value="">Seleccione</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal de editar --}}
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="formEdit">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" id="editName">
                    </div>
                    <div class="mb-3">
                        <label>Correo</label>
                        <input type="email" name="email" class="form-control" id="editEmail">
                    </div>
                    <div class="mb-3">
                        <label>Nueva Contraseña (opcional)</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Rol</label>
                        <select name="role" class="form-control" id="editRole">
                            <option value="">Seleccione</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="submit">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    @includeIf('admin.vistas.usuarios.script')
@endsection
