@extends('publico.script.publicaciones.eventosscrit')
@section('title')
Eventos
@endsection

@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
<p class="subtitulo-amarillo">"CADA EVENTO, UNA OPORTUNIDAD DE AYUDAR"</p>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/stylespublicidad.css') }}">
@endsection

@section('contenido')

<!-- Encabezado del módulo de eventos -->
<section class="evento-encabezado">
  <div class="contenido-encabezado">
    <h1>Próximos Eventos</h1>
    <p>Descubre y participa en nuestros eventos más recientes.</p>
  </div>
</section>

<div class="row" id="publicaciones-grid">
    @foreach ($eventos as $evento)
        <div class="col-md-4 col-sm-6 mb-4 publicacion-item" data-id="{{ $evento['id'] }}">
            <div class="publicacion-preview" data-toggle="modal" data-target="#modalPublicacion" 
                 data-publicacion-id="{{ $evento['id'] }}">
                <div class="preview-image-container">
                    @if(!empty($evento['imagen']))
                        <img src="{{ asset('storage/' . $evento['imagen']) }}" alt="{{ $evento['evento'] }}" class="preview-image">
                    @else
                        <div class="preview-no-image d-flex align-items-center justify-content-center h-100">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="preview-content">
                    <h3 class="preview-title">{{ $evento['evento'] }}</h3>
                    <p class="preview-excerpt">
                        Del {{ \Carbon\Carbon::parse($evento['fechainicial'])->format('d/m/Y') }} 
                        al {{ \Carbon\Carbon::parse($evento['fechafinal'])->format('d/m/Y') }}
                    </p>
                    <div class="preview-footer">
                        <span class="preview-tipo">
                            Estado: {{ $evento['estado'] == 1 ? 'Activo' : 'Inactivo' }}
                        </span>
                        <span class="preview-fecha">
                            <i class="fas fa-calendar-alt"></i> 
                            Creado: {{ \Carbon\Carbon::parse($evento['created_at'])->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
