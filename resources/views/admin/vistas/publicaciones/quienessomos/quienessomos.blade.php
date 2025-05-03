@extends('admin.script.quienessomos.quienessomosscrip')
@section('titulo')
    <title>Donaciones</title>
@endsection

@section('tituloprincipal')
    <div class="row justify-content-center align-content-center text-center">
        <h2>Formulario Quiénes Somos</h2>
    </div>
@endsection
@section('contenido')
    <form action="guardar.php" method="post">

        <label for="quienes somos">quienes somos:</label><br>
        <textarea name="quienes somos" id="quienes somos" rows="5" cols="50" required></textarea><br><br>

        <label for="mision">mision:</label><br>
        <textarea name="mision" id="mision" rows="5" cols="50" required></textarea><br><br>

        <label for="vision">Visión:</label><br>
        <textarea name="vision" id="vision" rows="5" cols="50" required></textarea><br><br>

        <label for="valores">Valores:</label><br>
        <textarea name="valores" id="valores" rows="5" cols="50" required></textarea><br><br>

        <input type="submit" value="Guardar">
    </form>

@endsection
