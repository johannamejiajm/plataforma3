@extends('publico.plantilla.plantilla')
@section('titulo')
    <title>
        Artistas
    </title>
@endsection
@section('tituloprincipal')
    <h1>Artistas Activos</h1>
@endsection
@section('contenido')

@section('links')

<link rel="stylesheet" href="{{ asset('assets/css/artistas.css') }}">

@endsection


<body class="p-4">
    <div class="container">
 

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($artistas->isEmpty())
            <p>No hay artistas activos en este momento.</p>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($artistas as $artista)
                    <div class="col">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $artista->imagen ?? 'https://via.placeholder.com/150' }}" 
                                 class="card-img-top" 
                                 alt="{{ $artista->nombre }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $artista->nombre }}</h5>
                                <p class="card-text">{{ $artista->descripcion ?? 'Sin descripción' }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Teléfono: {{ $artista->telefono ?? 'No disponible' }}</li>
                                <li class="list-group-item">Email: {{ $artista->email ?? 'No disponible' }}</li>
                            </ul>
                        
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" 
            crossorigin="anonymous"></script>
</body>

    <head>
        <style>
            h1 {
                text-align: center;
                margin-bottom: 30px;
                color: rgb(9, 83, 231);
            }

            .card {
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                background-color: rgb(53, 22, 226);
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 20px rgb(14, 0, 0);
            }

            .card-img-top {
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
                object-fit: cover;
                height: 200px;
                background-color: #f0f0f0;
            }

            .alert-success {
                margin-bottom: 30px;
                background-color: #4caf50;
                color: white;
                border-radius: 5px;
            }

            .list-group-item {
                font-size: 14px;
                background-color: #f7fafc;
                border: none;
            }

            .card-body h5 {
                font-size: 18px;
                font-weight: bold;
                color: rgb(255, 255, 255);
            }

            .card-body p {
                color: rgb(248, 242, 242);
            }

            .container {
                max-width: 1200px;
                margin: auto;
            }

            .card-footer {
                background-color: #2b2d42;
                color: white;
                border-radius: 0 0 10px 10px;
                text-align: center;
                padding: 10px;
            }

            .card-body ul {
                padding-left: 15px;
            }

            .list-group-item:last-child {
                border-bottom: none;
            }
        </style>
    </head>

    <body class="p-4">
        <div class="container">


            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($artistas->isEmpty())
                <p>No hay artistas activos en este momento.</p>
            @else
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($artistas as $artista)
                        <div class="col">

                            <div class="card" style="width: 18rem;">


                                @if ($artista->imagen)
                                    <img src="{{ asset('storage/' . $artista->imagen) }}" class="card-img-top"
                                        alt="{{ $artista->nombre }}">
                                @else
                                    <img src="https://via.placeholder.com/200x200?text=Sin+Foto" class="card-img-top" alt="Sin imagen">
                                @endif



                                <div class="card-body">
                                    <h5 class="card-title">{{ $artista->nombre }}</h5>
                                    <p class="card-text">{{ $artista->descripcion ?? 'Sin descripción' }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Teléfono: {{ $artista->telefono ?? 'No disponible' }}</li>
                                    <li class="list-group-item">Email: {{ $artista->email ?? 'No disponible' }}</li>
                                </ul>

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
            crossorigin="anonymous"></script>
    </body>

@endsection