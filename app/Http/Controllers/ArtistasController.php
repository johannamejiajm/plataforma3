<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
   
    public function index()
    {
        $artistas = Artistas::all();
        $artistas = Artistas::leftJoin('eventos', 'artistas.idevento', '=', 'eventos.id')
            ->select(
                'artistas.id as artista_id',
                'artistas.idevento',
                'eventos.evento as nombre_evento',
                'artistas.identidad',
                'artistas.nombre as nombre_artista',
                'artistas.email',
                'artistas.telefono',
                'artistas.imagen',
                'artistas.descripcion',
                'artistas.fecharegistro',
                'artistas.estado as estado_artista',
                'artistas.created_at as artista_creado_en',
                'artistas.updated_at as artista_actualizado_en'
            )
            ->get();

        return view('admin/vistas/artistas.index', compact('artistas'));
      
    }
    
   
    /**
     * Activa o desactiva un artista.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cambiarEstado(Request $request, $id)
    {
        $artista = Artistas::findOrFail($id);

        $nuevoEstado = $artista->estado == '1' ? '0' : '1';
        $artista->estado = $nuevoEstado;
        $artista->save();

        return redirect()->route('artistas.index')->with('success', 'El estado del artista ha sido actualizado.');
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
    public function show(Artistas $artistas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artistas $artistas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artistas $artistas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artistas $artistas)
    {
        //
    }
}
