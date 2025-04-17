@extends('publico.script.publicaciones.publicacionesscript')

@section('titulo')

    <title>Quienes Somos</title>

@endsection


@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quiénes Somos - Pacho’s Club</title>
  <style>
    /* Estilos aplicados desde ¿Quiénes Somos? hacia abajo */
.container {
  max-width: 800px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f5f5f5;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  font-family: 'Arial', sans-serif;
}

.container h2 {
  color: #2c3e50;
  border-bottom: 2px solid #3498db;
  padding-bottom: 10px;
}

.container p {
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}

.container ul {
  padding-left: 20px;
}

.container li {
  font-size: 16px;
  color: #555;
  margin-bottom: 8px;
}

  </style>
</head>
<body>

  <header>
  </header>

  <div class="container">
    <h2>¿Quiénes Somos?</h2>
    <p>
      Somos una fundación comprometida con el bienestar social, enfocada en generar oportunidades para comunidades vulnerables mediante programas educativos, de salud y desarrollo humano.
    </p>
  </div>

  <div class="container">
    <h2>Misión</h2>
    <p>
    Somos una Fundación que implementa un modelo de intervención integral para promover la educación Deportiva de calidad con apoyo privado, para niños y niñas en comunidades menos favorecidas desplazadas y en situación de vulnerabilidad en el municipio, donde la escuela es vista como un centro de desarrollo comunitario
    </p>
  </div>

  <div class="container">
    <h2>Visión</h2>
    <p>
    Para el 2029 la fundación PACHO’S CLUB debe ser reconocida como una de las principales entidades sociales de la región Cesar que promueva la distribución y utilización de fondos para caridad con el sólo propósito de contribuir el espíritu comunitario.
    </p>
  </div>

  <div class="container">
    <h2>Valores</h2>
    <ul>
      <li>Solidaridad</li>
      <li>Compromiso Social</li>
      <li>Equidad</li>
      <li>Transparencia</li>
      <li>Espiritu Comunitario</li>
      <li>Educacion Transformadora</li>
      <li>Innovacion Social</li>
    </ul>
  </div>
@endsection