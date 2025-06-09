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

                <div class="accordion mt-4" id="infoAccordion">

                    @foreach (['quienes_somos' => 'Quiénes Somos', 'mision' => 'Misión', 'vision' => 'Visión', 'valores' => 'Valores'] as $clave => $titulo)
                        @php
                            $item = $informaciones->firstWhere('tipo.tipo', $titulo);
                        @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $clave }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $clave }}" aria-expanded="false"
                                    aria-controls="collapse-{{ $clave }}">
                                    {{ $titulo }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $clave }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $clave }}" data-bs-parent="#infoAccordion">
                                <div class="accordion-body">

                                    @if ($item)
                                        <form>
                                            <!-- Contenido -->
                                            <div class="mb-3">
                                                <label class="form-label">Contenido</label>
                                                <textarea id="contenido-{{$item->id}}" rows="4" class="form-control">{{ $item->contenido }}</textarea>
                                            </div>

                                            <!-- Foto actual -->
                                            @if ($item->foto)
                                                <div class="mb-3">
                                                    <label class="form-label">Foto actual:</label><br>
                                                    <img src="{{ asset('storage/' . $item->foto) }}" class="img-thumbnail"
                                                        style="max-width: 200px;">
                                                </div>
                                            @endif

                                            <!-- Cambiar foto -->
                                            <div class="mb-3">
                                                <label class="form-label">Cambiar Foto (opcional)</label>
                                                <input type="file" id="foto-{{$item->id}}" name="foto[]" class="form-control" accept="image/*">
                                            </div>
                                        </form>
                                        <div class="d-grid">
                                            <button onclick="actualizarinformacion({{$item->id}},{{$item->idtipo}})"
                                                class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                    @else
                                        <div class="alert alert-warning">
                                            No se encontró información para <strong>{{ $titulo }}</strong>.
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
@endsection
