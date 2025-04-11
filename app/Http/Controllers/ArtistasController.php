<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artistas = artistas::all();
        return view('publico/vistas/artistas/inscripciones', compact('artistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ... (tu lógica para mostrar el formulario de creación)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario (sin idevento)
        // $request->validate([

        //     'identidad' => 'required|string|max:50',
        //     'nombre' => 'required|string|max:100',
        //     'email' => 'required|email|max:150',
        //     'telefono' => 'required|string|max:20',
        //     'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'descripcion' => 'nullable|string|max:2000',
        //     'fecharegistro' => 'required|date',
        // ]);

        // // Subir la imagen si está presente
        // if ($request->hasFile('foto')) {
        //     $fotoPath = $request->file('foto')->store('artistas', 'public');
        // } else {
        //     $fotoPath = null; // Si no se sube foto, se pone como null
        // }

        // Crear el nuevo artista en la base de datos
        $artista = artistas::create([
            'idevento' => 1, // Asignar idevento directamente aquí
            'identidad' => $request->identidad,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'imagen' => 1, // O $fotoPath si quieres guardar la ruta
            'descripcion' => $request->descripcion,
            'fecharegistro' => $request->fecharegistro,
            'estado' => 1,
        ]);

        $respuesta = array(
            'mensaje' => "inscripcion exitosa",
            "estado" => 1,
        );

        // return response()->json($respuesta);
        // Redirigir a la página de crear artista con un mensaje de éxito
        return redirect()->route('artistas.create')->with('success', 'Artista creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artistas $artistas)
    {
        // ...
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artistas $artistas)
    {
        // ...
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artistas $artistas)
    {
        // ...
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artistas $artistas)
    {
        // ...
    }
}