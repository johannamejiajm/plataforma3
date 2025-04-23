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

<form action="{{ route('artistas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Evento</label>
    <select name="idevento">
        @foreach ($eventos as $evento)
            <option value="{{ $evento->id }}">{{ $evento->evento }}</option>
        @endforeach
    </select>

    <label>Identidad</label>
    <input type="text" name="identidad" required>

    <label>Nombre</label>
    <input type="text" name="nombre" required>

    <label>Email</label>
    <input type="email" name="email">

    <label>Teléfono</label>
    <input type="text" name="telefono">

    <label>Descripción</label>
    <textarea name="descripcion"></textarea>

    <label>Fecha Registro</label>
    <input type="date" name="fecharegistro">

    <label>Imagen</label>
    <input type="file" name="imagen">

    <label>Estado</label>
    <select name="estado">
        <option value="1">Activo</option>
        <option value="0">Inactivo</option>
    </select>

    <button type="submit">Guardar Artista</button>
</form>


@endsection
