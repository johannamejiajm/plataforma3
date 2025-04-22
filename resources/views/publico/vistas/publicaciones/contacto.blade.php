@extends('publico.script.publicaciones.contactoscript')
@section('titulo')
<title>contactos</title>

@endsection
@section('tituloprincipal')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Contactos | TechConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: rgb(0, 10, 102); /* Azul cobalto */
            --secondary-color: #002366; /* Azul marino */
            --accent-color: #D22B2B; /* Rojo brillante */
            --light-color: #f8f9fa;
            --white-color: #ffffff;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --border-radius: 10px;
            --box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            background-color: #f9fbfd;
            color: var(--dark-color);
            line-height: 1.6;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%230047AB' fill-opacity='0.05'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero {
            text-align: center;
            padding: 80px 0 50px;
            background-size: 100%;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgb(1, 17, 248), rgb(255, 255, 255), rgba(243, 6, 6, 0.94));
            z-index: -1;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        .hero p {
            font-size: 18px;
            color: var(--secondary-color);
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .contacto-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 50px 0;
            gap: 30px;
        }

        .contacto-info {
            flex: 1;
            min-width: 300px;
            background-color: var(--white-color);
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            position: relative;
            overflow: hidden;
            z-index: 1;
            border: 1px solid rgba(0, 71, 171, 0.1);
        }

        .mapa-container {
            flex: 1;
            min-width: 300px;
            height: 450px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            border: 1px solid rgba(0, 71, 171, 0.1);
            border-right: 3px solid var(--primary-color);
            border-bottom: 3px solid var(--accent-color);
        }

        .contacto-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--accent-color));
            z-index: -1;
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .info-item {
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(236, 228, 228, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
            font-size: 20px;
            flex-shrink: 0;
            border: 1px solid rgba(0, 71, 171, 0.2);
        }

        .info-details h4 {
            font-size: 18px;
            margin-bottom: 5px;
            color: var(--secondary-color);
        }

        .info-details p {
            color: var(--gray-color);
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            margin-top: 30px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background-color: rgba(0, 71, 171, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: var(--primary-color);
            font-size: 16px;
            transition: var(--transition);
            border: 1px solid rgba(0, 71, 171, 0.2);
        }

        .social-links a:nth-child(odd):hover {
            background-color: var(--primary-color);
            color: var(--white-color);
        }

        .social-links a:nth-child(even):hover {
            background-color: var(--accent-color);
            color: var(--white-color);
        }

        /* Estilo alterno para los elementos de información */
        .info-item:nth-child(odd) .info-icon {
            color: var(--primary-color);
        }

        .info-item:nth-child(even) .info-icon {
            color: var(--accent-color);
        }

        /* Borde decorativo */
        .contacto-info {
            border-right: 3px solid var(--primary-color);
            border-bottom: 3px solid var(--accent-color);
        }

        /* Estilo especial para la ubicación */
        .ubicacion-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 25px;
        }

        .ubicacion-container .info-item {
            margin-bottom: 15px;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        @media (max-width: 992px) {
            .contacto-wrapper {
                flex-direction: column;
            }
            
            .mapa-container {
                height: 350px;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 50px 0 30px;
            }
            
            .hero h1 {
                font-size: 36px;
            }

            .contacto-info {
                margin-right: 0;
            }
            
            .mapa-container {
                height: 300px;
            }
        }
    </style>
</head>
</http>
@endsection
@section('contenido')
<body>

    <section class="hero">
        <div class="container">
            <h1>Centro de Contacto</h1>
            <p>Estamos aquí para ayudarte. Ponte en contacto con nuestro equipo de soporte y responderemos a todas tus preguntas lo antes posible.</p>
        </div>
    </section>

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
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="mapa-container">
                <iframe src="https://www.google.com/maps/embed?pb=!4v1744157878941!6m8!1m7!1s1ACcJlzibcoiuRmxs8UAOA!2m2!1d8.304805676780639!2d-73.62666916106214!3f85.25628592770805!4f4.654949059101455!5f0.9891491240026099" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

</body>
@endsection


