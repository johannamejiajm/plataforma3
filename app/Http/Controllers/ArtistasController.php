<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function listarArtistasActivos()
    {
        $artistasActivos = Artistas::where('estado', '1')->get(); // Assuming '1' represents active

        return view('publico/vistas/artistas/listar_artistas', ['artistas' => $artistasActivos]);
    }
    public function index()
    {
        return view('publico/vistas/artistas/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'Required|string|max:255'
        ]);
        Artistas::create($request->all());

        return redirect()->route('artistas.create')->with('success','Artistas registrados exitosamente');
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
