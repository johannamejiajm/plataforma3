@extends('publico.plantilla.plantilla')

@section('title')
  Eventos
@endsection

@section('tituloheader')
  FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
  EVENTOS
@endsection

@section('contenido')

<!-- Encabezado del módulo de eventos -->
<section class="evento-encabezado">
  <div class="contenido-encabezado">
    <h1>Próximos Eventos</h1>
    <p>Descubre y participa en nuestros eventos más recientes.</p>
  </div>
</section>

<!-- Lista de eventos -->
<section class="eventos-lista">
  <div class="contenedor-grid">
    @if ($eventos)
      @foreach ($eventos as $evento)
        <div class="tarjeta-evento">
          <img src="{{ asset($evento->fotos[0]->imagen) }}" alt="{{ $evento->titulo }}">
          <h2>{{ $evento->titulo }}</h2>
          <p class="fecha">{{ $evento->fechainicial }}</p>
          <p class="descripcion">{{ Str::limit($evento->descripcion, 100) }}</p>
          <a href="{{ route('eventos.show', $evento->id) }}" class="btn-detalles">Ver más</a>
        </div>
      @endforeach
    @endif
  </div>
</section>

@endsection

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/css/styleseventos.css') }}">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
@endsection

