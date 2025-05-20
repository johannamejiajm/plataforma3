@extends('publico.script.donaciones.donacionesscript')
@section('titulo')
<title>Donaciones</title>
@endsection
@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white">
                    <h3 class="mb-0">Registro de Donaciones</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form id='enviodonante'>


                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="donacion" class="form-label">Donación ($)</label>
                            <input type="number" step="0.01" class="form-control" id="donacion" name="donacion">
                        </div>
                        <div class="mb-3">
                            <label for="idtipo" class="form-label">Tipo de Donacion</label>
                            <select class="form-control" id="idtipo" name="idtipo">
                                @foreach ($tiposdonaciones as $tipodonacion)
                                <option value="{{ $tipodonacion->id }}">{{ $tipodonacion->tipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid">
                            <button type="submit" id='guardardonante' class="btn btn-primary btn-lg">Registrar
                                donación</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <h5 class="modal-title mb-3" id="qrModalLabel">Escanea el QR para donar</h5>
      <div id="qrcode" class="mb-3"></div>
      <a id="whatsappLink" href="#" class="btn btn-success" target="_blank">Ir a WhatsApp</a>
    </div>
  </div>
</div>
@session('success')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">¡Donación Registrada!</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <p class="mb-0">La donación ha sido registrada correctamente. ¡Gracias!</p>
                    </div>
                    <div class="d-grid gap-2">

                        <a href="/" class="btn btn-secondary">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsession




@endsection