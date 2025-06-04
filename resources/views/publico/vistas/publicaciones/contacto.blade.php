@extends('publico.script.publicaciones.contactoscript')
@section('titulo')
    <title>Contactos</title>
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/contatosadmin03.css') }}">
@endsection
@section('tituloheader')
    FUNDACION PACHO'S CLUB
@endsection
@section('subtituloheader')
    <p class="subtitulo-amarillo">"TU PUENTE HACIA FUNDACIÓN PACHO'S CLUB"</p>
@endsection
@section('contenido')
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
                            <h4>direccion</h4>
                            <p>{{$contactos->direccion ?? ''}}</p>
                        </div>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="info-details">
                        <h4>Teléfono 1</h4>
                        <p>+57 {{ $contactos->telefono1 ?? ''}} </p>

                        <h4>Teléfono 2</h4>
                        <p>+57 {{ $contactos->telefono2 ?? ''}}</p>
                    </div>

                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-details">
                        <h4>email</h4>
                        <p>{{ $contactos->email ?? ''}}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-details">
                        <h4>Horario</h4>
                        <p>{{ $contactos->horario ?? ''}}</p>
                        <h4>Horario Extras</h4>
                        <p>{{ $contactos->horarioextras ?? ''}}</p>
                    </div>
                </div>

                <div class="social-links">

                    <a href="{{ $contactos->urlfacebook ?? ''}}" target="_bank"><i class="fab fa-facebook-f"></i></a>

                    <a href="#"><i class="fab fa-instagram"></i></a>

                    <a href="#"><i class="fa-solid fa-xmark"></i></a>


                </div>
            </div>

            <div class="mapa-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!4v1744157878941!6m8!1m7!1s1ACcJlzibcoiuRmxs8UAOA!2m2!1d8.304805676780639!2d-73.62666916106214!3f85.25628592770805!4f4.654949059101455!5f0.9891491240026099"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> {{-- Aquí aparecen tus errores personalizados --}}
            @endforeach
        </ul>
    </div>
@endif

@endsection