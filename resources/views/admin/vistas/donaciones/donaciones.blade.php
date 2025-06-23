@extends('admin.script.donaciones.donacionesscript')
@section('title', 'Administracion de Donaciones')

@section('content')

    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="col-12 ">
                <h1 class="text-center">MODULO DONACIONES</h1>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                <a href="{{ route('donaciones.index', ['idtipo' => 'todos']) }}" class="btn btn-primary w-100">Todos</a>
            <a href="{{ route('donaciones.index', ['idtipo' => 'pendiente']) }}"
                    class="btn btn-warning w-100">Pendientes</a>
                <a href="{{ route('donaciones.index', ['idtipo' => 'aprobado']) }}"
                    class="btn btn-success w-100">Aprobados</a>
                <a href="{{ route('donaciones.index', ['idtipo' => 'denegado']) }}"
                    class="btn btn-danger w-100">Denegados</a>
            </div>

            <div class="table-responsive mt-4">

                <table id="donaciones" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tipo de Donación</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellido</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Donación</th>
                            <th class="text-center">Soporte</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $filtro = request('idtipo');
                        @endphp

                        @foreach ($donaciones as $donacion)
                            <tr id="donacion-{{ $donacion->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $donacion->tipoDonacion->tipo ?? 'Sin tipo' }}</td>
                                <td class="text-center">{{ $donacion->nombre }}</td>
                                <td class="text-center">{{ $donacion->apellido }}</td>
                                <td class="text-center">{{ $donacion->email }}</td>
                                <td class="text-center">{{ $donacion->telefono }}</td>
                                <td class="text-center">{{ $donacion->donacion }}</td>
                                <td class="text-center">
                                    @if ($donacion->soporte && ($filtro === 'todos' || $filtro === 'aprobado'))

                                    <a type="button" class="btn btn-primary" href="{{ asset('storage/' . $donacion->soporte) }}" target="_blank"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    @else
                                        No adjuntó
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($donacion->idtipo == 0)
                                        <div class="d-flex gap-2 d-md-block">
                                            <button type="button" class="btn btn-success btn-sm"
                                                onclick="confirmarEstado({{ $donacion->id }}, 1)">Aprobar</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmarEstado({{ $donacion->id }}, 2)">Denegar</button>
                                        </div>
                                    @elseif ($donacion->idtipo == 1)
                                       <p class="badge bg-success" >Aprobado</p>
                                    @elseif($donacion->idtipo == 2)
                                         <p class="badge bg-danger" >Denegado</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="Modalaprobado" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Soporte Donación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="number" class="form-control" id="idDonacion" hidden>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="soporte" name="soporte">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="aprobar()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
