@extends('publico.script.publicaciones.contactoscript')
@section('titulo')
<title>contactos</title>

@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/contatosadmin03.css') }}">
@section('tituloprincipal')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Contactos | TechConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   
</head>
</http>
@endsection
@section('contenido')
<body>



    <div class="container">
        <div class="contacto-wrapper">
            <div class="contacto-info">
                <h2 class="section-title">Información de Contacto</h2>

                <div class="ubicacion-container">
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-details">
                            <h4>Ubicación</h4>
                            <p> Cra 8 # 8-101 AGUACHICA-CESAR</p>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="info-details">
                        <h4>Teléfono</h4>
                        <p>+573013772079 </p>
                        <p>+573186157178</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-details">
                        <h4>Correo Electrónico</h4>
                        <p>fundacionpachosclub@outlook.com</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-details">
                        <h4>Horario de Atención</h4>
                        <p>Lunes a Viernes: 8:00 AM - 12:00 PM - DE 2:00 PM- 6:00 PM</p>
                        <p>Sábados: 8:00 AM - 12:00 PM</p>
                    </div>
                </div>

                <div class="social-links">

                    <a href="#"><i class="fab fa-facebook-f"></i></a>

                    <a href="#"><i class="fab fa-instagram"></i></a>
                
                </div>
            </div>
            
            <div class="mapa-container">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1744157878941!6m8!1m7!1s1ACcJlzibcoiuRmxs8UAOA!2m2!1d8.304805676780639!2d-73.62666916106214!3f85.25628592770805!4f4.654949059101455!5f0.9891491240026099" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

</body>
@endsection


