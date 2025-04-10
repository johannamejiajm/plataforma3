<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artistas Activos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" 
        crossorigin="anonymous">
    <style>
        body {
            background-color:rgb(24, 75, 230);
            font-family: 'Arial', sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2d3748;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color:rgb(206, 186, 186);
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
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
            color: #2b2d42;
        }
        .card-body p {
            color: #6c757d;
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
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
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
        <h1>Artistas Activos</h1>

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
</html>
