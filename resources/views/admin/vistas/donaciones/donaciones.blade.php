<!-- @extends('admin.plantilla.plantilla')
@section('script')
    <script>
        $(document).ready(function() {
            let tabladonaciones = new DataTable('#tabladonaciones', {
                responsive: true
            });
        });
    </script>
@endsection -->
@extends('admin.script.donaciones.donacionesscript')
@section('titulo')
    <title>Donaciones</title>
@endsection

@section('tituloprincipal')
    <div class="row justify-content-center align-content-center text-center">
        <h2>MODULO DONACIONES</h2>
    </div>
@endsection
@section('contenido')

    <div class="container mt-5">

        <div class=" d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
            <a href="{{ route('donaciones.index', ['estado' => 'todos']) }}" class="btn btn-primary w-100">Todos</a>
            <a href="{{ route('donaciones.index', ['estado' => 'aprobado']) }}" class="btn btn-success w-100">Aprobados</a>
            <a href="{{ route('donaciones.index', ['estado' => 'pendiente']) }}" class="btn btn-warning w-100">Pendientes</a>
            <a href="{{ route('donaciones.index', ['estado' => 'denegado']) }}" class="btn btn-danger w-100">Denegados</a>
        </div>

        <div class="table-responsive mt-4">
            
        <table id="donaciones" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Tipo de Donación</th>
                    <th class="text-center">Donante</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Contacto</th>
                    <th class="text-center">Donación</th>
                    <th class="text-center">Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donaciones as $donacion)
                    <tr>
                        <td>{{ $donacion->id }}</td>
                        <td>{{ $donacion->tipoDonacion->tipo }}</td>
                        <td>{{ $donacion->donante }}</td>
                        <td>{{ $donacion->fecha }}</td>
                        <td>{{ $donacion->contacto }}</td>
                        <td>{{ $donacion->donacion }}</td>
                        <td>
                            @if ($donacion->estado == 1)
                                Aprobado
                            @else
                                Denegado
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

@endsection
