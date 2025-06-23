@extends('publico.script.artistas.artistasscript')

@section('titulo')
    <title>
        Artistas
    </title>
@endsection

@section('tituloheader')
    <p class="titulo-blanco"> FUNDACION PACHO'S CLUB</p>
@endsection

@section('subtituloheader')
<p class="subtitulo-amarillo">"Deja tu huella en nuestros eventos"</p>
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/inscripciones.css') }}">
@endsection

@section('contenido')
<div class="don-form-wrapper">
    <div class="don-form-container">
        <h1>Postulate a nuestros eventos</h1>
    <!-- Formulario HTML -->



        <form  enctype="multipart/form-data"
            class="border p-4 rounded shadow-sm bg-white">

            <div class="mb-3">
                <label for="idevento" class="form-label">Evento</label>
                <select name="idevento" id="idevento" class="form-control">
                    <option value="">Seleccione un evento</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->id }}">{{ $evento->evento }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="identidad" class="form-label">Número de Identidad</label>
                <input type="text" name="identidad" id="identidad"
                    class="form-control @error('identidad') is-invalid @enderror" value="{{ old('identidad') }}">
                @error('identidad')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com"
                    value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="123-456-7890"
                    value="{{ old('telefono') }}">
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
            </div>

            <input type="hidden" name="estado" value="0">
            <button type="submit" id='guardarartistas' class="btn btn-primary w-100">¡Postularme!</button>
        </form>
    </div>
</div>



@endsection
