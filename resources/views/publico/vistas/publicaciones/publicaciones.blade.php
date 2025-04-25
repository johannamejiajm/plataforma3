@extends('publico.script.publicaciones.publicacionesscript')
@session('titulo')
    <title>Publicaciones</title>
@endsession

@section('tituloprincipal')


@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/stylespublicidad.css') }}">
@endsection


    <section class="hero">
        <div class="container">
            <h1>Publicaciones</h1>
            <p>Mantente al día con las últimas noticias, historias de éxito y actualizaciones de la fundación Pacho's Club.</p>
        </div>
    </section>


@endsection


@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $publicaciones->titulo }}</h2>
                    <a href="{{ route('publicaciones.indexpublicacionespublico') }}" class="btn btn-secondary">Volver</a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <strong>Tipo:</strong> {{ $publicaciones->tipoPublicacion->tipo }}
                        </div>
                        <div class="col-md-4">
                            <strong>Autor:</strong> {{ $publicaciones->autor->nombre }}
                        </div>
                        <div class="col-md-4">
                            <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($publicaciones->fecha)->format('d/m/Y') }}
                        </div>
                    </div>

                    @if($publicaciones->imagen)
                        <div class="text-center mb-4">
                            <img src="{{ asset($publicaciones->imagen) }}" alt="{{ $publicaciones->titulo }}" class="img-fluid">
                        </div>
                    @endif

                    <div class="publicacion-contenido">
                        {{ $publicaciones->contenido }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection