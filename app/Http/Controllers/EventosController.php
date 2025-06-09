<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventosRequest;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;

class EventosController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:manage_eventos');
    }

    public function index()
    {
        $eventos = Evento::all();
        return view('admin/vistas/eventos.index', compact('eventos'));
    }

public function store(EventosRequest $request)
{
    $datos = $request->only(['evento', 'fechainicial', 'fechafinal']);

    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $extension = $imagen->getClientOriginalExtension();
        $nombreHash = Str::uuid() . '.' . $extension;
        $ruta = $imagen->storeAs('eventos', $nombreHash, 'public');
        $datos['imagen'] = $ruta;
    }
    $datos['estado'] = '1';

    Evento::create($datos);

    return redirect()->back()->with('success', 'Evento creado exitosamente.');
}

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return response()->json($evento);
    }

   public function update(EventosRequest $request, $id)
{
    DB::beginTransaction();
    try {
        $evento = Evento::findOrFail($id);

        $datos = $request->only(['evento', 'fechainicial', 'fechafinal', 'estado']);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $extension = $imagen->getClientOriginalExtension();
            $nombreHash = Str::uuid() . '.' . $extension;
            $ruta = $imagen->storeAs('eventos', $nombreHash, 'public');
            $datos['imagen'] = $ruta;
        }

        $evento->update($datos);

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
