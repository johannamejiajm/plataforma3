@extends('admin.script.publicaciones.contactosscript') 


@section('titulo')
    Contactos
@endsection

@section('links')
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --light-gray: #f5f5f5;
            --dark-gray: #333;
            --white: #ffffff;
            --sidebar-width: 250px;
        }
        
        body {
            background-color: var(--light-gray);
        }
        
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .logo {
            padding: 15px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }
        
        .logo h2 {
            color: var(--white);
            font-size: 22px;
        }
        
        .menu-item {
            padding: 12px 20px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .menu-item.active {
            background-color: var(--primary-color);
        }
        
        .menu-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
        }
        
        .header {
            background-color: var(--white);
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background-color: var(--white);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .card-header h3 {
            font-size: 18px;
            color: var(--dark-gray);
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .card-value {
            font-size: 28px;
            font-weight: bold;
            color: var(--dark-gray);
        }
        
        .content-section {
            background-color: var(--white);
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--light-gray);
        }
        
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--light-gray);
        }
        
        table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .edit-btn {
            background-color: #f0ad4e;
            color: var(--white);
        }
        
        .delete-btn {
            background-color: #d9534f;
            color: var(--white);
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                overflow: hidden;
            }
            
            .logo h2, .menu-item span {
                display: none;
            }
            
            .menu-item i {
                margin-right: 0;
                font-size: 20px;
            }
            
            .main-content {
                margin-left: 70px;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard-cards {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
        }
    </style>
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
                        <label for="twitter">Twitter:</label>
                        <input type="url" id="twitter" class="form-control" value="https://twitter.com/">
                    </div>
                    
                    <div class="form-group">
                        <label for="instagram">Instagram:</label>
                        <input type="url" id="instagram" class="form-control" value="https://instagram.com/">
                    </div>
                    
                    <div class="form-group">
                        <label for="linkedin">LinkedIn:</label>
                        <input type="url" id="linkedin" class="form-control" value="https://linkedin.com/">
                    </div>
                </form>
            </div>
@endsection