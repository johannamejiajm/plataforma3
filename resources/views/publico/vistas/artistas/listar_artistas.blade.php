@extends('publico.plantilla.plantilla')

@section('links')
<link rel="stylesheet" href="{{ asset('assets/css/artistas.css') }}">
@endsection

@section('titulo')
<title>
    Artistas
</title>
@endsection

@section('tituloprincipal')
<h1>Artistas Activos</h1>
@endsection

@section('contenido')



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

@endsection




