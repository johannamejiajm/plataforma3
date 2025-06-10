<?php

namespace App\Http\Controllers;

use App\Http\Requests\InscripcionesRequest;
use App\Models\Artistas;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class ArtistasController extends BaseController
{


    public function __construct()
    {
        $this->middleware('permission:manage_artistas')->except(['create','store','listarArtistasActivos']);
    }


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

    }

    
    public function create()
    {
        $eventos = Evento::all(); // obtener eventos para el select
        return view('publico/vistas/artistas/create', compact('eventos'));
    }

    
    public function store(InscripcionesRequest $request)
    {
        

        DB::beginTransaction();
        try {

            $datos = [
                'idevento'    => $request->idevento,
                'identidad'   => $request->identidad,
                'nombre'      => $request->nombre,
                'email'       => $request->email,
                'telefono'    => $request->telefono,
                'descripcion' => $request->descripcion,
                'estado'      => '0',
            ];

       
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes_artistas', 'public');
            $datos['imagen'] = $path;
        }

            $artista = Artistas::create($datos);
             
             
            DB::commit();
            return response()->json([
                'mensaje'   => "Artista registrada exitosamente, ",
                'estado'    => 0,
                
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar Artista: '.$e->getMessage());
            return response()->json([
                'mensaje' => 'Ocurrió un error al guardar el artistas.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    
    public function show(Artistas $artistas)
    {
        //
    }

    
    public function edit(Artistas $artistas)
    {
        $artistas = Artistas::find($artistas->id);
        return view("admin/vistas/artistas/editartistas", compact('artistas'));
    }

    
    public function update(Request $request, Artistas $artistas)
    {
        //
    }

    
    public function destroy(Artistas $artistas)
    {
        //
    }
}
