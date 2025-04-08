@extends('publico.script.donaciones.donacionesscript')
@section('titulo')
    <title>Donaciones</title>

@endsection
@section('contenido')


   
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
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

                            <form  id = 'enviodonante'>
                               
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="donante" class="form-label">Donante</label>
                                    <input type="text" class="form-control" id="donante" name="donante" required>
                                </div>
                                <div class="mb-3">
                                    <label for="contacto" class="form-label">Contacto</label>
                                    <input type="text" class="form-control" id="contacto" name="contacto"
                                        placeholder="Email o teléfono" required>
                                </div>
                                <div class="mb-3">
                                    <label for="donacion" class="form-label">Donación ($)</label>
                                    <input type="number" step="0.01" class="form-control" id="donacion" name="donacion"
                                        min="1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="soporte" class="form-label">Soporte</label>
                                    <select class="form-control" id="soporte" name="soporte">
                                        <option value="">Seleccione</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Tarjeta">Tarjeta</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>

                                <input type="hidden" name="idtipo" value="3">
                                <div class="d-grid">
                                    <button type="submit" id ='guardardonante' class="btn btn-primary btn-lg">Registrar Donación</button>
                                </div>
                            </form>
                        </div>
                    </div>
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