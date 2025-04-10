<?php

namespace App\Http\Controllers;

use App\Models\Donaciones;
use Illuminate\Http\Request;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el estado de la URL, por defecto es 'todos' si no se pasa ningún valor
        $estado = $request->get('estado', 'todos'); 

        // Realizar la consulta dinámica según el estado
        if ($estado == 'todos') {
            
            $donaciones = Donaciones::with('tipoDonacion')->get();
        } else {
            
            $donaciones = Donaciones::whereHas('tipoDonacion', function ($query) use ($estado) {
                if ($estado == 'aprobado') {
                    $query->where('tipo', 'aprobado');
                } elseif ($estado == 'denegado') {
                    $query->where('tipo', 'denegado');
                } elseif ($estado == 'pendiente') {
                    $query->where('tipo', 'pendiente');
                }
            })
            ->get();
        }

        // Pasar las donaciones filtradas y el estado actual a la vista
        return view('admin/vistas/donaciones/donaciones', compact('donaciones', 'estado'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Donaciones $donaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donaciones $donaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donaciones $donaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donaciones $donaciones)
    {
        //
    }
}
