@extends('publico.script.artistas.artistasscript')

@section('titulo')
    <title>
        Artistas
    </title>
@endsection

@section('tituloheader')
FUNDACION PACHO'S CLUB
@endsection

@section('subtituloheader')
<p class="subtitulo-amarillo">"DEJA TU HUELLA EN NUESTROS EVENTOS"</p>
@endsection


@section('contenido')
    <!-- Formulario HTML -->
<div class="d-flex justify-content-center mt-5">
    <div class="container" style="max-width: 600px;">
        <h2 class="text-center mb-4">Postulate a nuestros eventos</h2>

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
