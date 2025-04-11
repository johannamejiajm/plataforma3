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
    public function active()
    {
        return view('publico/vistas/artistas/index');
    }
   
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

        //$artistas = artistas::all();
        //return view('publico/vistas/artistas/inscripciones', compact('artistas'));

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

public function crearArtistas(Request $request) {

        // Crear el nuevo artista con la relación al evento
        $artista = artistas::create([
            'idevento' => $request->idevento,
            'nidentidad' => $request->nidentidad,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            //'foto' => $fotoPath,
            'descripcion' => $request->descripcion,
            'fecharegistro' => $request->fecharegistro,
            'estado' => $request->estado,
        ]);

        // Redirigir o enviar una respuesta
        return redirect()->route('artistas.create')->with('success', 'Artista creado correctamente.');
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
        $artistas = Artistas::find($artistas->id);
        return view("admin/vistas/artistas/editartistas", compact('artistas'));
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
