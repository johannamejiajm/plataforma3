@extends('publico.script.publicaciones.historiasscript')

{{-- @section('title')
Historia
@endsection
@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/styleshistoria.css') }}">
@endsection

@extends('publico.script.publicaciones.publicacionesscript') --}}

@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
<p class="subtitulo-amarillo">"EXPERIENCIAS QUE INSPIRAN"</p>
@endsection

@section('titulo')
    <title>Historias</title>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/stylespublicidad.css') }}">
@endsection

@section('contenido')
<div class="container publicaciones-container">
    <h2 class="mb-4 text-center">Historias</h2>

    <div class="row" id="historias-grid">
        @foreach($historias as $historia)
            <div class="col-md-4 col-sm-6 mb-4 publicacion-item" data-id="{{ $historia->id }}" data-toggle="modal" data-target="#modalPublicacion" data-publicacion-id="{{ $historia->id }}">
                <div class="publicacion-preview">
                    <div class="preview-image-container">
                        @if($historia->fotos && count($historia->fotos) > 0)
                            <img src="{{ asset($historia->fotos[0]->imagen) }}" alt="{{ $historia->titulo }}" class="preview-image">
                        @else
                            <div class="preview-no-image d-flex align-items-center justify-content-center h-100">
                                <i class="fas fa-newspaper fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>
                    <div class="preview-content">
                        <h3 class="preview-title">{{ $historia->titulo }}</h3>
                        <p class="preview-excerpt" data-contenido-completo="{{ $historia->contenido }}">
                            {{ \Illuminate\Support\Str::limit(strip_tags($historia->contenido), 120) }}
                        </p>
                        <div class="preview-footer">
                            <span class="preview-fecha">
                                <i class="fas fa-calendar-alt"></i>
                                {{ \Carbon\Carbon::parse($historia->fecha)->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(method_exists($historias, 'links') && $historias instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
                {{ $historias->links() }}
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Modal para mostrar la historia completa -->
<div class="modal fade modal-publicacion" id="modalPublicacion" tabindex="-1" role="dialog" aria-labelledby="modalPublicacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPublicacionLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modalContenido"></div>
            </div>
        </div>
    </div>
</div>

<!-- Botón flotante para volver arriba -->
<button class="back-to-top" id="btnBackToTop">
    <i class="fas fa-chevron-up"></i>
</button>
@endsection
