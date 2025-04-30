
@extends('publico.plantilla.plantilla')
@section('titulo')
<title>
    Artistas
</title>
@endsection
@section('tituloprincipal')
<h1>Registrar Artistas</h1>
@endsection
@section('contenido')


<body>
<div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-8 mt-10">
 

    <form action="{{ route('artistas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Identidad:</label>
            <input type="text" name="identidad" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Nombre:</label>
            <input type="text" name="nombre" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Email:</label>
            <input type="email" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Teléfono:</label>
            <input type="text" name="telefono" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Imagen:</label>
            <input type="file" name="imagen" class="w-full px-4 py-2 border rounded-lg file:border-0 file:bg-blue-500 file:text-white file:font-medium file:px-4 file:py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Evento:</label>
            <select name="idevento" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->evento }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Descripción:</label>
            <textarea name="descripcion" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Fecha de Registro:</label>
            <input type="date" name="fecharegistro" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition-all">
                Guardar Artista
            </button>
        </div>
    </form>
</div>
</body>


@endsection