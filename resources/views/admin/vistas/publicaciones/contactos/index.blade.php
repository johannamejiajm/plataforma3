@extends('admin.script.publicaciones.contactosscript') 


@section('titulo')
    Contactos
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/contactos.css') }}">
@endsection

@section('tituloprincipal')
    <h1>Administracion de Contactos</h1>
@endsection

@section('contenido')
<div class="content-section">
                <div class="section-header">
                    <h2>Administrar Información de Contacto</h2>
                    <button class="btn btn-primary" type="submit" id="guardarcontactos">Guardar Cambios</button>
                </div>
                
                <form >
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" id="direccion" class="form-control" value="{{$contactos->direccion}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono1">Teléfono 1:</label>
                        <input type="text" id="telefono1" class="form-control" value="{{$contactos->telefono1}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono2">Teléfono 2:</label>
                        <input type="text" id="telefono2" class="form-control" value="{{$contactos->telefono2}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" class="form-control" value="{{ $contactos->email }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="horarios">Horario:</label>
                        <input type="text" id="horarios" class="form-control" value="{{ $contactos->horario }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="horarioextras">Horario extra:</label>
                        <input type="text" id="horarioextras" class="form-control" value="{{ $contactos->horarioextras }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="embebido">Código de Mapa Embebido:</label>
                        <textarea id="embebido" class="form-control" rows="">{{ $contactos->embebido }}</textarea>
                    </div>
                    
                    <h3 style="margin: 20px 0 15px;">Enlaces de Redes Sociales</h3>
                    
                    <div class="form-group">
                        <label for="urlfacebook">Facebook:</label>
                        <input type="url" id="urlfacebook" class="form-control" value="{{ $contactos->urlfacebook }}">
                    </div>

                    <div class="form-group">
                        <label for="urlx">x:</label>
                        <input type="url" id="urlx" class="form-control" value="{{ $contactos->urlx }}">
                    </div>

                    
                    <div class="form-group">
                        <label for="urlinstagram">Instagram:</label>
                        <input type="url" id="urlinstagram" class="form-control" value="{{ $contactos->urlinstagram }}">
                    </div>

                </form>
            </div>
@endsection