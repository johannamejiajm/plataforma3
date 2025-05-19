@extends('admin.script.quienessomos.quienessomosscrip')
@section('title', 'Administración de Quiénes Somos')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
@endsection

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!-- Encabezado -->
        <div class="row">
            <div class="col-12 p-3">
                <h1 class="text-center">Información Institucional</h1>
            </div>

            <!-- Botón de Agregar -->
            <div class="col-12">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoModal">
                    <i class="ti ti-plus"></i> Nueva Información
                </button>
            </div>
            <div class="table-responsive mt-4">
                <table class="table table-striped table-bordered w-100" id="infoTable">
                    <thead>
                        <tr class="text-center text-muted">
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Contenido</th>
                            <th>Foto</th>
                            <th>Fecha Inicial</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Cargado vía AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL Crear/Editar -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <form id="infoForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="infoId">
                    <div class="modal-header">
                        <h5 class="modal-title" id="infoModalLabel">Agregar / Editar Información</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body row g-3">

                        <div class="col-md-6">
                            <label for="idtipo" class="form-label">Tipo de Información</label>
                            <select name="idtipo" id="idtipo" class="form-select" required>
                                <option value="" disabled selected>Seleccione tipo</option>
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="fechainicial" class="form-label">Fecha Inicial</label>
                            <input type="datetime-local" name="fechainicial" id="fechainicial" class="form-control"
                                required>
                        </div>

                        <div class="col-12">
                            <label for="contenido" class="form-label">Contenido</label>
                            <textarea class="form-control" name="contenido" id="contenido" rows="4" required></textarea>
                        </div>

                        <div class="col-12">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" id="estado" class="form-select" required>
                                <option value="" disabled selected>--Seleccione--</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                            <div class="mt-2" id="fotoPreview"></div>
                        </div>

                        <div class="col-12">
                            <label for="foto" class="form-label">Foto (opcional)</label>
                            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                            <div class="mt-2" id="fotoPreview"></div>
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
    @endsection