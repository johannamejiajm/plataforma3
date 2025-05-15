<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

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
        'estado' => 'required|in:0,1',
    ]);

    Evento::create($request->all());
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

    $evento = Evento::findOrFail($id);
    $evento->update($request->all());

    return redirect()->route('eventos.index')->with('success', 'Evento actualizado correctamente.');
}

public function destroy($id)
{
    Evento::destroy($id);
    return redirect()->route('admin/vistas/eventos.index')->with('success', 'Evento eliminado.');
} 


}