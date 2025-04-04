@extends('publico.script.donaciones.donacionesscript')
@section('titulo')
<title>Donaciones</title>
 
@endsection
@section('contenido')
<table class="donante-form">
        <tr>
            <td><label for="nombre">Nombre Completo:</label></td>
            <td><input type="text" name="nombre" id="nombre" value="{{ $donante['nombre'] ?? '' }}" disabled></td>
        </tr>
        <tr>
            <td><label for="email">Correo Electrónico:</label></td>
            <td><input type="email" name="email" id="email" value="{{ $donante['email'] ?? '' }}" disabled></td>
        </tr>
        <tr>
            <td><label for="telefono">Teléfono:</label></td>
            <td><input type="tel" name="telefono" id="telefono" value="{{ $donante['telefono'] ?? '' }}" disabled></td>
        </tr>
        <tr>
            <td><label for="monto">Monto Donado:</label></td>
            <td><input type="number" name="monto" id="monto" value="{{ $donante['monto'] ?? '' }}" disabled></td>
        </tr>
        <tr>
            <td><label for="metodo_pago">Método de Pago:</label></td>
            <td>
                <select name="metodo_pago" id="metodo_pago" disabled>
                    <option value="">Seleccionar</option>
                    <option value="paypal" {{ ($donante['metodo_pago'] ?? '') === 'paypal' ? 'selected' : '' }}>PayPal</option>
                    <option value="tarjeta" {{ ($donante['metodo_pago'] ?? '') === 'tarjeta' ? 'selected' : '' }}>Tarjeta de Crédito</option>
                    <option value="transferencia" {{ ($donante['metodo_pago'] ?? '') === 'transferencia' ? 'selected' : '' }}>Transferencia Bancaria</option>
                </select>
            </td>
        </tr>
    </table>

@endsection