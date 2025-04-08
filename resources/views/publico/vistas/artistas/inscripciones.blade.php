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
    
    <h1>Crear Nuevo Artista</h1>
    <form > 

        <label for="nidentidad">N Identidad:</label>
        <input type="text" name="nidentidad" id="nidentidad"><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono"><br><br>

        <label for="foto">Foto:</label>
         <input type="file" name="foto" id="foto"><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea><br><br>

        <label for="fecharegistro">Fecha de Registro:</label>
        <input type="date" name="fecharegistro" id="fecharegistro"><br><br>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado"><br><br>

        <button type="submit">Crear Artista</button>
    </form>

    
</body>

@endsection
