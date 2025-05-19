<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{

    public function index()
    {
        $eventos = Evento::all();
        return view('admin/vistas/eventos.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evento' => 'required|string|max:255',
            'fechainicial' => 'required|date',
            'fechafinal' => 'required|date|after_or_equal:fechainicial',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // valida una sola imagen
        ]);

        $datos = $request->only(['evento', 'fechainicial', 'fechafinal']);
        $datos['estado'] = '1';
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');

            $extension = $imagen->getClientOriginalExtension();
            $nombreHash = Str::uuid() . '.' . $extension;

            // Guarda la imagen en storage/app/public/eventos/
            $ruta = $imagen->storeAs('eventos', $nombreHash, 'public');

            $datos['imagen'] = $ruta;
        }

        Evento::create($datos);

        return redirect()->back()->with('success', 'Evento creado exitosamente.');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return response()->json($evento);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'evento' => 'required',
            'fechainicial' => 'required|date',
            'fechafinal' => 'required|date',
            'estado' => 'required|in:0,1',
        ]);

        DB::beginTransaction();
        try {
            $evento = Evento::findOrFail($id);
            $evento->update($request->all());

            DB::commit();
            return response()->json(['success' => 'Evento actualizado correctamente.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error al actualizar el evento.'], 500);
        }
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        // Verificamos si hay artistas asociados
        if ($evento->artistas()->count() > 0) {
            return response()->json([
                'error' => 'No se puede eliminar el evento porque tiene artistas asociados.'
            ], 400);
        }

        DB::beginTransaction();
        try {
            $evento->delete();
            DB::commit();

            return response()->json([
                'success' => 'Evento eliminado correctamente.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Ocurrió un error al intentar eliminar el evento.'
            ], 500);
        }
    }
}
