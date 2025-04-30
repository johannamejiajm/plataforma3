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
        @foreach($publicaciones as $publicacion)
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $publicacion->titulo }}</h2>
                    <a href="{{ route('publicaciones.indexpublicacionespublico') }}" class="btn btn-secondary">Volver</a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <strong>Tipo:</strong> {{ optional($publicacion->tipo)->tipo ?? 'Sin tipo' }}
                        </div>
                        <div class="col-md-4">
                            <strong>Autor:</strong> {{ optional($publicacion->usuario)->name ?? 'Anónimo' }}
                        </div>
                        <div class="col-md-4">
                            <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($publicacion->fecha)->format('d/m/Y') }}
                        </div>
                    </div>

                    
                    @if($publicacion->fotos)
                        @foreach ($publicacion->fotos as $foto)
                            <div class="text-center mb-4">
                                <img src="{{ asset(  $foto->imagen) }}" alt="{{ $foto->imagen }}" class="img-fluid">
                            </div>
                        @endforeach
                        
                    @endif

                    <div class="publicacion-contenido">
                        {{ $publicacion->contenido }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection