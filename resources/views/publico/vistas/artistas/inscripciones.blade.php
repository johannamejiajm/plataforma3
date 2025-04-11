@extends('publico.script.artistas.artistasscript')
@section('titulo')
<title>Inscripciones</title>
@endsection
@section('tituloprincipal')
<div class="row justify-content-center align-content-center text-center">
    <h2>inscripcion de artistas</h2>
</div>
@endsection
@section('contenido')

<body>
    
<div class="container mt-5">
    <h1 class="text-primary-color text-center mb-4">Crear Nuevo Artista</h1>
    <form class="row g-3" action="{{ route('artistas.store') }}" method="POST">
    @csrf
        <div class="col-md-6">
            <label for="idevento" class="form-label text-primary-color">Evento:</label>
            <input type="text" class="form-control" name="idevento" id="idevento">
        </div>
        <div class="col-md-6">
            <label for="nidentidad" class="form-label text-primary-color">N Identidad:</label>
            <input type="text" class="form-control" name="nidentidad" id="nidentidad">
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label text-primary-color">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label text-primary-color">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="col-md-6">
            <label for="telefono" class="form-label text-primary-color">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" id="telefono">
        </div>
        <div class="col-12">
            <label for="foto" class="form-label text-primary-color">Foto:</label>
            <input type="file" class="form-control" name="foto" id="foto">
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label text-primary-color">Descripción:</label>
            <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
        </div>
        <div class="col-md-6">
            <label for="fecharegistro" class="form-label text-primary-color">Fecha de Registro:</label>
            <input type="date" class="form-control" name="fecharegistro" id="fecharegistro">
        </div>
       
            <!-- <label for="estado" class="form-label text-primary-color">Estado:</label> -->
            <input type="hidden" class="form-control" name="estado" id="estado" value="0">
     
        <div class="col-12 d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-primary-color ">Enviar informacion</button>
        </div>
        
    </form>
</div>

<style>
    /* Definición de los colores */
    :root {
        --white: #f8f9fa; /* Blanco suave para el fondo general */
        --dark-blue: #001f3f; /* Azul oscuro */
        --red: #dc3545; /* Rojo */
    }

    body {
        background-color: var(--white);
    }

    .container {
        max-width: 800px;
        margin: 30px auto;
        padding: 40px;
        background-color: #fff; /* Fondo blanco del contenedor */
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-top: 5px solid var(--dark-blue); /* Línea superior azul oscuro */
    }

    .text-primary-color {
        color: var(--dark-blue); /* Azul oscuro para el texto principal */
    }

    h1.text-primary-color {
        margin-bottom: 30px;
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 0.75rem;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: var(--red); /* Rojo al enfocar */
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); /* Sombra roja al enfocar */
    }

    .btn-primary-color {
        color: #fff;
        background-color: var(--dark-blue); /* Azul oscuro para el botón */
        border-color: var(--dark-blue);
        padding: 0.6rem 1.2rem;
        font-size: 1.1rem;
        border-radius: 0.3rem;
        cursor: pointer;
        transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn-primary-color:hover {
        background-color: #001428; /* Un tono más oscuro al pasar el mouse */
        border-color: #001428;
    }

    .btn-primary-color:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 31, 63, 0.5); /* Sombra azul oscuro al enfocar */
    }

    /* Estilo adicional para el botón (opcional - un toque de rojo al interactuar) */
    .btn-primary-color:active {
        background-color: var(--red);
        border-color: var(--red);
        box-shadow: none;
    }
</style>
    
</body>

@endsection
