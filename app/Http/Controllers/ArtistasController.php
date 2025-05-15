<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $eventos = Evento::all(); // obtener eventos para el select
        return view('publico/vistas/artistas.create', compact('eventos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {

            $validated = $request->validate([
                'idevento' => 'required|exists:eventos,id',
                'identidad' => 'required|string|max:20|unique:artistas,identidad',
                'nombre' => 'required|string|max:255',
                'email' => 'nullable|email',
                'telefono' => 'nullable|string|max:20',
                'imagen' => 'nullable|image|max:2048',
                'descripcion' => 'nullable|string',
                'estado' => 'required|in:1,0', // ahora acepta directamente 1 o 0

            ], [
                'identidad.required' => 'El campo número de identidad es obligatorio.',
                'identidad.unique' => 'Este número de identidad ya está registrado.',
                'identidad.max' => 'El número de identidad no debe tener más de 20 caracteres.',
                'imagen.max' => 'El campo de imagen no debe ser mayor a 2048 kilobytes.',
            ]);
            // Conversión del estado a entero (por si viene como string)
            // $validated['estado'] = (int)$request->estado;

            // Guardar la imagen si se subió
            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('imagenes_artistas', 'public');
                $validated['imagen'] = $path;
            }
            // Fecha de registro
            $validated['fecharegistro'] = now();

            // Crear el registro
            Artistas::create($validated);
            DB::commit();
            // Redirigir con mensaje
            return redirect()->route('artistas.create')->with('success', 'Artista registrado correctamente.');
        } catch (\Throwable $th) {
            DB::rollBack();

            // Mostrar el mensaje exacto del error
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $th->getMessage());
        }
    }


    public function crearArtistas(Request $request)
    {

        // Crear el nuevo artista con la relación al evento
        $artista = artistas::create([
            'idevento' => $request->idevento,
            'identidad' => $request->nidentidad,
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
