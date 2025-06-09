@extends('admin.plantilla.layout')
@section('content')
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="text-center mt-5">
            <h1 class="display-1">403</h1>
            <p class="lead">No tienes permiso para acceder a esta sección.</p>
            <a href="{{ route('admin.publicaciones.eventos.index') }}" class="btn btn-primary">Volver al panel</a>
        </div>
    </div>
</div>
@endsection