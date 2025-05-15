<!-- Agregar el bloque de estilo CSS al principio del documento -->

@extends('publico.plantilla.plantilla')


@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/artistas.css') }}">
@endsection

@section('titulo')
<title>
    Artistas
</title>
@endsection

@section('contenido')
<style>
    /* General body styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fc;
        color: #333;
    }

    /* Estilo para el contenedor del formulario */
    .container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        max-width: 600px;
        margin: 50px auto;
    }

    /* Título */
    h2 {
        color: #007bff;
        font-size: 32px;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Etiquetas de formulario */
    label {
        font-weight: bold;
        color: #555;
    }

    /* Estilo para los inputs y textarea */
    input.form-control, select.form-control, textarea.form-control {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        width: 100%;
        transition: all 0.3s ease;
    }

    input.form-control:focus, select.form-control:focus, textarea.form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    /* Estilo para el botón */
    button.btn {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 15px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    button.btn:hover {
        background-color: #0056b3;
    }

    /* Estilo para el campo de archivo (imagen) */
    input[type="file"].form-control {
        background-color: #f9f9f9;
        padding: 8px;
        border: 1px solid #ddd;
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* Estilo para los mensajes de error */
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-radius: 5px;
        padding: 10px;
        margin-top: 20px;
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
    }

    .alert-danger li {
        margin-bottom: 10px;
    }

    /* Ajuste de márgenes entre campos */
    .mb-3 {
        margin-bottom: 20px !important;
    }

    /* Estilos para el footer y otros elementos */
    footer {
        text-align: center;
        margin-top: 40px;
        font-size: 14px;
        color: #777;
    }
</style>

<!-- Formulario HTML -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Registrar Artista</h2>

    <form action="{{ route('artistas.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="idevento" class="form-label">Evento</label>
            <select name="idevento" id="idevento" class="form-control" required>
                <option value="">Seleccione un evento</option>
                @foreach ($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->evento }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
    <label for="identidad" class="form-label">Número de Identidad</label>
    <input 
        type="text" 
        name="identidad" 
        id="identidad" 
        class="form-control @error('identidad') is-invalid @enderror" 
        value="{{ old('identidad') }}" 
        required
    >
    @error('identidad')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>



        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="123-456-7890">
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <!-- <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div> -->

        <input type="hidden" name="estado" value="0">

        <button type="submit" class="btn btn-primary w-100">Guardar Artista</button>
    </form>
</div>
@endsection