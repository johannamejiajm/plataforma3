@extends('publico.script.publicaciones.inicioscript')

@section('titulo')
    <title>Inicio</title>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/inicio.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('contenido')


    <div class="contenedor-motivacional">
        <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen10.jpg') }}" alt="Imagen Motivacional Pachos Club">
        <div class="mensaje">
            <h2>¡Únete a la Familia Pachos Club!</h2>
            <p>Juntos construimos sueños, impulsamos el deporte y fortalecemos nuestra comunidad. ¡Tu apoyo hace la
                diferencia!</p>
        </div>
    </div>

    <div class="contenedor">
        <h2 class="text-center mb-4">GALERIA</h2>
        <div id="carruselImagenes1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Abuelos del Ancianito/Imagen10.jpg') }}"
                        class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen14.jpg') }}"
                        class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item ">
                    <img src="{{ asset('assets/images/imageneshistoria/IMAGENES PACHOS CLUB/Apoyo a los Artistas de la Región/Imagen15.jpg') }}"
                        class="d-block w-100" alt="Imagen 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carruselImagenes1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselImagenes1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container-fluid">
        <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
            <div class="d-flex gap-3 align-items-center">
                <img src="../assets/images/logos/favicon.png" alt="icon">
                <p class="fs-4 mb-0">Fundacion Pachos Club. </p>
            </div>
            <div>
                <p class="mb-0">Produced by <a target="_blank" href="https://www.wrappixel.com/"
                        class="text-primary link-primary">Wrappixel</a>.</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/inicio.js') }}"></script>
@endsection
