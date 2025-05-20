@extends('admin.script.donaciones.donacionesscript')
@section('title', 'Administracion de Donaciones')

@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-12 p-3">
                <h1 class="text-center">Gestión Donaciones</h1>
            </div>
            <div class="col-12 mb-4">
                <div class=" d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
                    <a href="{{ route('donaciones.index', ['estado' => 'todos']) }}" class="btn btn-primary w-100">Todos</a>
                    <a href="{{ route('donaciones.index', ['estado' => 'aprobado']) }}" class="btn btn-success w-100">Aprobados</a>
                    <a href="{{ route('donaciones.index', ['estado' => 'pendiente']) }}" class="btn btn-warning w-100">Pendientes</a>
                    <a href="{{ route('donaciones.index', ['estado' => 'denegado']) }}" class="btn btn-danger w-100">Denegados</a>
                </div>
            </div>
            <table id="tablaDonaciones" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tipo de Donación</th>
                        <th class="text-center">Donante</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Contacto</th>
                        <th class="text-center">Donación</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donaciones as $donacion)
                    <tr id="donacion-{{ $donacion->id }}" onclick="mostrarBotones({{ $donacion->id }})">
                        <td class="text-center">{{ $donacion->id }}</td>
                        <td class="text-center">{{ $donacion->tipoDonacion->tipo }}</td>
                        <td class="text-center">{{ $donacion->donante }}</td>
                        <td class="text-center">{{ $donacion->fecha }}</td>
                        <td class="text-center">{{ $donacion->contacto }}</td>
                        <td class="text-center">{{ $donacion->donacion }}</td>
                        <td class="text-center">
                            @if ($donacion->estado == 0)
                            <div class="d-flex gap-2 d-md-block">
                                <form action="{{ route('donaciones.update_estado', $donacion->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="estado" value="1">
                                    <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                                </form>

                                <form action="{{ route('donaciones.update_estado', $donacion->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="estado" value="2">
                                    <button type="submit" class="btn btn-danger btn-sm">Denegar</button>
                                </form>


                            </div>
                            @elseif ($donacion->estado == 1)
                            Aprobado
                            @elseif($donacion->estado == 2)
                            Denegado
                            @endif


                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <button class="btn btn-sm btn-danger btn-eliminar">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

