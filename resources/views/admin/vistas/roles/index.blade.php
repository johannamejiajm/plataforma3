@extends('admin.plantilla.layout')

@section('title', 'Administracion de Roles')

@section('content')




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
    @includeIf('admin.vistas.roles.script')
@endsection
