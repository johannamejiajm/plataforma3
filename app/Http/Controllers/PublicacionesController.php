<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicaciones::all();
        return view('admin/vistas/publicaciones/publicaciones', compact('publicaciones'));
    }
    public function indexpublicaciones()
    {
        $publicaciones = Publicaciones::all();
        return view('publico/vistas/publicaciones/publicaciones', compact('publicaciones'));
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
    public function show(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicaciones $publicaciones, $id)
    {

       $publicacion = Publicaciones::find($id);
       return view("admin/vistas/publicaciones/editpublicaciones", compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicaciones $publicaciones, $id)
    {
        $publicacionActualizar = Publicaciones::find($id);
        $publicacionActualizar->titulo = $request->inputtitulo;
        $publicacionActualizar->contenido = $request->inputcontenido;
        $publicacionActualizar->fechainicial = $request->inputfechainicial;
        $publicacionActualizar->fechafinal = $request->inputfechafinal;
        $publicacionActualizar->estado = $request->inputestado;
        $publicacionActualizar->save();

        return redirect('publicaciones');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicaciones $publicaciones)
    {
        //
    }
}
