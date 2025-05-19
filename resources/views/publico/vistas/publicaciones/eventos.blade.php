@extends('publico.plantilla.plantilla')

@section('title')
Eventos
@endsection

@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
NUESTROS EVENTOS
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

<!-- Lista de eventos -->
<section class="eventos-lista">
  <div class="contenedor-grid">
    @if ($eventos)
    @foreach ($eventos as $evento)
    <div class="tarjeta-evento">
      <div class="contenedor-imagen">
        {{-- <img src="{{ asset($evento?->fotos?[0]->imagen) }}" alt="{{ $evento->titulo }}"> --}}
      </div>
      <h2>{{ $evento->titulo }}</h2>
      <p class="fecha">{{ $evento->fechainicial }}</p>
      <p class="descripcion">{{ Str::limit($evento->descripcion, 100) }}</p>
      <a href="{{ route('publica.evento', $evento->id) }}" class="btn-detalles">Ver más</a>


    </div>
    @endforeach
    @endif
  </div>
</section>
@endsection
