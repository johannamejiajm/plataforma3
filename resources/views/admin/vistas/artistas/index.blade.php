@extends('admin.script.artistas.artistasscript')
@section('title', 'Administracion de Eventos')
@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center">Gestión de Artistas</h1>
            </div>
            @if (session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="fas fa-check-circle me-2" style="font-size: 1.5rem;"></i>
                <div>
                    {{ session('success') }}
                </div>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tablaartistas">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Evento</th>
                            <th>Identidad</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artistas as $artista)
                        <tr>
                            <td>{{ $artista->artista_id }}</td>
                            <td>{{ $artista->nombre_evento ?? 'Sin evento' }}</td>
                            <td>{{ $artista->identidad }}</td>
                            <td>{{ $artista->nombre_artista }}</td>
                            <td>{{ $artista->email }}</td>
                            <td>{{ $artista->telefono }}</td>
                            <td>
                                @if ($artista->estado_artista == '1')
                                <span class="badge bg-success">Activo</span>
                                @else
                                <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('artistas.cambiarEstado', $artista->artista_id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $artista->estado_artista == '1' ? 'btn-warning' : 'btn-success' }}">
                                        {{ $artista->estado_artista == '1' ? 'Desactivar' : 'Activar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
