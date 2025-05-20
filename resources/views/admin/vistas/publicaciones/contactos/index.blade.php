@extends('admin.plantilla.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/contactos.css') }}">
@endsection

@section('title', 'Administracion de Contactos')

@section('content')

  <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
<div class="col-12 mb-5 mt-5 text-center">
    <h2>Administrar Información de Contacto</h2>
</div>
         
<div class="content-section">
                <div class="section-header">
                   <h2> Contacto</h2>

                </div>
                <form novalidate action="{{ route('admin.contactos')  }}" method="POST" >
                      @csrf
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" id="direccion" class="form-control" value="{{$contactos->direccion}}" name="direccion">
                    </div>
                    <div class="form-group">
                        <label for="telefono1">Teléfono 1:</label>
                        <input type="text" id="telefono1" class="form-control" value="{{$contactos->telefono1}}" name="telefono1">
                    </div>

                    <div class="form-group">
                        <label for="telefono2">Teléfono 2:</label>
                        <input type="text" id="telefono2" class="form-control" value="{{$contactos->telefono2}}" name="telefono2">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" value="{{ $contactos->email }}" name="email">
                    </div>

                    <div class="form-group">
                        <label for="horarios">Horario:</label>
                        <input type="text" id="horarios" class="form-control" value="{{ $contactos->horario }}" name="horario">
                    </div>

                    <div class="form-group">
                        <label for="horarioextras">Horario extra:</label>
                        <input type="text" id="horarioextras" class="form-control" value="{{ $contactos->horarioextras }}" name="horarioextras">
                    </div>

                    <div class="form-group">
                        <label for="embebido">Código de Mapa Embebido:</label>
                        <textarea id="embebido" class="form-control" rows="" name="embebido">{{ $contactos->embebido }}</textarea>
                    </div>

                    <h3 style="margin: 20px 0 15px;">Enlaces de Redes Sociales</h3>

                    <div class="form-group">
                        <label for="urlfacebook">Facebook:</label>
                        <input type="url" id="urlfacebook" class="form-control" value="{{ $contactos->urlfacebook }}" name="urlfacebook">
                    </div>

                    <div class="form-group">
                        <label for="urlx">x:</label>
                        <input type="url" id="urlx" class="form-control" name="urlx" value="{{ $contactos->urlx }}">
                    </div>


                    <div class="form-group">
                        <label for="urlinstagram">Instagram:</label>
                        <input type="url" id="urlinstagram" class="form-control" name="urlinstagram" value="{{ $contactos->urlinstagram }}">
                    </div>

                    <button class="btn btn-primary" type="submit" id="guardarcontactos">Guardar Cambios</button>

                </form>
            </div>
              </div>
          </div>
          </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#linkContactos').addClass('active');
    });
</script>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '{{ session('error') }}',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
@endsection
