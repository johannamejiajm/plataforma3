@extends('publico.script.publicaciones.publicacionesscript')

@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
<p class="subtitulo-amarillo">"UN EQUIPO CON UNA MISIÓN"</p>
@endsection

@section('titulo')
    <title>Quienes Somos</title>
@endsection

@section('links')

    <link rel="stylesheet" href="{{ asset('assets/css/quienessomos.css') }}">

@endsection

@section('contenido')
  @foreach ($informaciones as $informacion)
        <div class="container">
           <h1>{{ $informacion->tipo->tipo}}</h1>
            <p>
                {{ $informacion->contenido}}
            </p>


        </div>
    @endforeach
@endsection
