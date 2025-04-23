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
                    <button class="btn btn-primary"><i class="fas fa-save"></i> Guardar Cambios</button>
                </div>
                
                <form id="contactInfoForm">
                    <div class="form-group">
                        <label for="location">Ubicación:</label>
                        <input type="text" id="location" class="form-control" value="Cra 8 # 8-101 AGUACHICA-CESAR">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone1">Teléfono 1:</label>
                        <input type="text" id="phone1" class="form-control" value="+573013772079">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone2">Teléfono 2:</label>
                        <input type="text" id="phone2" class="form-control" value="+573186157178">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" class="form-control" value="fundacionpachosclub@outlook.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="weekdayHours">Horario de Lunes a Viernes:</label>
                        <input type="text" id="weekdayHours" class="form-control" value="8:00 AM - 12:00 PM - DE 2:00 PM- 6:00 PM">
                    </div>
                    
                    <div class="form-group">
                        <label for="saturdayHours">Horario de Sábados:</label>
                        <input type="text" id="saturdayHours" class="form-control" value="8:00 AM - 12:00 PM">
                    </div>
                    
                    <div class="form-group">
                        <label for="mapEmbed">Código de Mapa Embebido:</label>
                        <textarea id="mapEmbed" class="form-control" rows="4">https://www.google.com/maps/embed?pb=!4v1744157878941!6m8!1m7!1s1ACcJlzibcoiuRmxs8UAOA!2m2!1d8.304805676780639!2d-73.62666916106214!3f85.25628592770805!4f4.654949059101455!5f0.9891491240026099</textarea>
                    </div>
                    
                    <h3 style="margin: 20px 0 15px;">Enlaces de Redes Sociales</h3>
                    
                    <div class="form-group">
                        <label for="facebook">Facebook:</label>
                        <input type="url" id="facebook" class="form-control" value="https://facebook.com/">
                    </div>

                    
                    <div class="form-group">
                        <label for="instagram">Instagram:</label>
                        <input type="url" id="instagram" class="form-control" value="https://instagram.com/">
                    </div>

                </form>
            </div>
@endsection