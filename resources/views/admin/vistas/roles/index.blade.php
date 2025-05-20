@extends('admin.script.roles.rolesscript')
@section('title', 'Administracion de Roles')
@section('content')
<div class="body-wrapper-inner">
  <div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-12 p-3">
        <h1 class="text-center">Gestión Roles</h1>
      </div>
      <div class="col-12 mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"> <i
            class="ti ti-plus"></i> Crear Rol</button>
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
@include('admin.vistas.roles.modal-create')
@include('admin.vistas.roles.modal-edit')
@endsection