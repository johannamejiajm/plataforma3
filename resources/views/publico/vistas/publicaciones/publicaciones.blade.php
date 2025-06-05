@extends('publico.script.publicaciones.publicacionesscript')

@section('titulo')
    <title>Publicaciones</title>
@endsection

@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
<p class="subtitulo-amarillo">"UN EQUIPO CON UNA MISIÓN"</p>
@endsection


@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/stylespublicidad.css') }}">
@endsection

@section('contenido')
    <div class="container publicaciones-container">
        @if(isset($tipos) && count($tipos) > 0)
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <div class="form-group mb-0">
                        <select class="form-control form-control-sm" id="filtroTipo">
                            <option value="">Todos los tipos</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <div class="row" id="publicaciones-grid">
            @foreach($publicaciones as $publicacion)
                <div class="col-md-4 col-sm-6 mb-4 publicacion-item" 
                     data-id="{{ $publicacion->id }}" 
                     data-tipo="{{ $publicacion->tipo_id }}"
                     data-autor="{{ optional($publicacion->usuario)->name ?? 'Anónimo' }}"
                     data-autor-email="{{ optional($publicacion->usuario)->email ?? '' }}">
                    <div class="publicacion-preview" data-toggle="modal" data-target="#modalPublicacion" 
                         data-publicacion-id="{{ $publicacion->id }}">
                        <div class="preview-image-container">
                            @if($publicacion->fotos && count($publicacion->fotos) > 0)
                                <img src="{{ asset($publicacion->fotos[0]->imagen) }}" alt="{{ $publicacion->titulo }}" class="preview-image">
                            @else
                                <div class="preview-no-image d-flex align-items-center justify-content-center h-100">
                                    <i class="fas fa-newspaper fa-3x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="preview-content">
                            <h3 class="preview-title">{{ $publicacion->titulo }}</h3>
                            <p class="preview-excerpt" data-contenido-completo="{{ $publicacion->contenido }}">
                                {{ \Illuminate\Support\Str::limit(strip_tags($publicacion->contenido), 120) }}
                            </p>
                            <div class="preview-footer">
                                @php
                                    $tipoNombre = strtolower(optional($publicacion->tipo)->tipo);
                                @endphp
                                <span class="preview-tipo tipo-{{ $tipoNombre }}">
                                    {{ optional($publicacion->tipo)->tipo ?? 'Sin tipo' }}
                                </span>
                                <span class="preview-fecha">
                                    <i class="fas fa-calendar-alt"></i> 
                                    {{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(method_exists($publicaciones, 'links') && $publicaciones instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    {{ $publicaciones->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="modal fade modal-publicacion" id="modalPublicacion" tabindex="-1" role="dialog" aria-labelledby="modalPublicacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPublicacionLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="modalContenido"></div>
                </div>
            </div>
        </div>
    </div>

    <button class="back-to-top" id="btnBackToTop">
        <i class="fas fa-chevron-up"></i>
    </button>
@endsection

@section('publicacionesscript')

@endsection