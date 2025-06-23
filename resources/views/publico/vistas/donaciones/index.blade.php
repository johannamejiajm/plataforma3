@extends('publico.script.donaciones.donacionesscript')
@section('titulo')
    <title>Donaciones</title>
@endsection
@section('tituloheader')
    <p class="titulo-blanco"> FUNDACION PACHO'S CLUB</p>
@endsection

@section('subtituloheader')
    <p class="subtitulo-amarillo">"Tu apoyo transforma vidas"</p>
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/donaciones.css') }}">
@endsection


@section('contenido')
    <div class="don-form-wrapper">
        <div class="don-form-container">
            <h1>Registro de Donaciones</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="enviodonante">
                <div class="don-form-group">
                    <label for="nombre" class="don-form-label">Nombre</label>
                    <input type="text" class="don-form-input" id="nombre" name="nombre" value="{{ old('nombre') }}"
                        required>
                </div>
                <div class="don-form-group">
                    <label for="apellido" class="don-form-label">Apellido</label>
                    <input type="text" class="don-form-input" id="apellido" name="apellido" value="{{ old('apellido') }}"
                        required>
                </div>
                <div class="don-form-group">
                    <label for="telefono" class="don-form-label">Teléfono</label>
                    <input type="tel" class="don-form-input" id="telefono" name="telefono" value="{{ old('telefono') }}"
                        required>
                </div>
                <div class="don-form-group">
                    <label for="email" class="don-form-label">Email</label>
                    <input type="email" class="don-form-input" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="don-form-group">
                    <label for="donacion" class="don-form-label">Donación ($)</label>
                    <input type="number" class="don-form-input" id="donacion" name="donacion" min="1" step="0.01"
                        value="{{ old('donacion') }}" required>
                </div>
                <div class="don-form-group">
                    <label for="tipodonacion" class="form-label">Tipo de Donacion</label>
                    <select class="form-control" id="tipodonacion" name="tipodonacion" required>
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
