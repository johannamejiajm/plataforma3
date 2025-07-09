@extends('admin.plantilla.layout')

@section('title', 'Administracion de Noticias')

@section('content')

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
      @includeIf('admin.vistas.publicaciones.noticias.script')
@endsection
