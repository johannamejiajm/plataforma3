 <div class="container mt-5">
        <h2>Detalle del Evento</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $event->evento }}</h5>
                <p class="card-text"><strong>Fecha Inicial:</strong> {{ $event->fechainicial }}</p>
                <p class="card-text"><strong>Fecha Final:</strong> {{ $event->fechafinal }}</p>
                <p class="card-text"><strong>Estado:</strong> {{ $event->estado == '1' ? 'Activo' : 'Inactivo' }}</p>
                <p class="card-text"><strong>Creado el:</strong> {{ $event->created_at }}</p>
                <p class="card-text"><strong>Actualizado el:</strong> {{ $event->updated_at }}</p>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>