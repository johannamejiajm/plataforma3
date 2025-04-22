<?php

namespace App\Http\Controllers;

use App\Models\Informacioninstitucional;
use Illuminate\Http\Request;

class InformacioninstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $url = $request->url(); // O puedes colocar la URL manualmente

    // Extraer la parte del nombre (en este caso, 'quienessomos')
        $path = parse_url($url, PHP_URL_PATH);  // Extrae el path de la URL
        $name = basename($path);  // Obtiene el nombre de la última parte del path

        $url_view = 'publico.vistas.publicaciones.' . $name;

        // dd($url_view);

        return view($url_view);
    
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
    public function show(Informacioninstitucional $informacioninstitucional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informacioninstitucional $informacioninstitucional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informacioninstitucional $informacioninstitucional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informacioninstitucional $informacioninstitucional)
    {
        //
    }
}
