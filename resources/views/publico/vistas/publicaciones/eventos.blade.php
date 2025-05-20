@extends('publico.plantilla.plantilla')

@section('title')
  Eventos
@endsection

@section('tituloheader')
  "Donde los sueños toman forma digital: así nace nuestra página, así comienza tu historia."
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
      {{-- @foreach ($eventos as $evento)
        <div class="tarjeta-evento">
          <img src="{{ asset($evento->fotos[0]->imagen) }}" alt="{{ $evento->titulo }}">
          <h2>{{ $evento->titulo }}</h2>
          <p class="fecha">{{ $evento->fechainicial }}</p>
          <p class="descripcion">{{ Str::limit($evento->descripcion, 100) }}</p>
          <a href="{{ route('eventos.show', $evento->id) }}" class="btn-detalles">Ver más</a>
        </div>
      @endforeach --}}
      @foreach ($eventos as $evento)
        <div class="tarjeta-evento">
            <div class="contenedor-imagen">
            <img src="{{ asset($evento->fotos[0]->imagen) }}" alt="{{ $evento->titulo }}">
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

@section('links')
  <link rel="stylesheet" href="{{ asset('assets/css/styleseventos.css') }}">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
@endsection

<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #fff;
  }
  footer {
    background-color: #172339;
    color: #b3b3b3;
    padding: 40px 20px;
    font-size: 13px;
  }
  .footer-container {
    max-width: 1024px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .footer-column {
    min-width: 160px;
    margin-bottom: 20px;
  }
  .contact-info {
    flex: 1;
    min-width: 180px;
  }
  .contact-info p,
  .contact-info a {
    margin: 8px 0;
    color: #b3b3b3;
    font-size: 14px;
    text-decoration: none;
    display: flex;
    align-items: center;
  }
  .contact-info p svg,
  .contact-info a svg {
    margin-right: 8px;
  }
  .footer-column h4 {
    color: #00bfa5;
    margin-bottom: 12px;
    font-weight: 600;
  }
  .footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-column ul li {
    margin-bottom: 8px;
  }
  .footer-column ul li a {
    color: #b3b3b3;
    text-decoration: none;
    font-size: 13px;
    transition: color 0.3s;
  }
  .footer-column ul li a:hover {
    color: #00bfa5;
  }
  .social-icons {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    gap: 10px;
  }
  .social-icons a {
    color: #b3b3b3;
    font-size: 20px;
    text-decoration: none;
  }
  .footer-bottom {
    max-width: 1024px;
    margin: 0 auto;
    border-top: 1px solid #283348;
    padding: 15px 20px;
    font-size: 11px;
    color: #46506f;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .footer-bottom a {
    color: #46506f;
    text-decoration: none;
    font-weight: 600;
    font-size: 12px;
  }
</style>
