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
        <h4>Listado de Donaciones</h4>
        <table id="donaciones" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Donación</th>
                    <th>Estado de Donación</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Juan Pérez</td><td>2024/03/15</td><td>Completado</td></tr>
                <tr><td>María López</td><td>2024/02/20</td><td>Pendiente</td></tr>
                <tr><td>Carlos Gómez</td><td>2024/01/10</td><td>Cancelado</td></tr>
                <tr><td>Lucía Fernández</td><td>2023/12/05</td><td>Completado</td></tr>
                <tr><td>Pedro Ramírez</td><td>2023/11/18</td><td>Pendiente</td></tr>
            </tbody>
        </table>
    </div>

        </tbody>
        </table>
@endsection