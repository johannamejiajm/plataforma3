<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicacionRequest;
use App\Models\Publicaciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tipopublicaciones;



class PublicacionesController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function data(Request $request)
    {
        $typePublic = Str::after($request->getPathInfo(), '/api/admin/');

        // Buscar el ID del tipo desde la base de datos
        $idTipo = Tipopublicaciones::where('tipo', ucfirst($typePublic))->value('id');

        $publicaciones = Publicaciones::with(['usuario', 'tipo'])
            ->where('idtipo', $idTipo)
            ->get();

        $data = $publicaciones->map(function($pub) {
            return [
                'id' => $pub->id,
                'titulo' => $pub->titulo,
                'contenido' => $pub->contenido,
                'fecha_inicial' => Carbon::parse($pub->fechainicial)->format('d M Y, h:i A'),
                'fecha_final' =>  Carbon::parse($pub->fechafinal)->format('d M Y, h:i A'),
                'estado' => $pub->estado == '1' ? 'Activo' : 'Inactivo',
            ];
        });

        return response()->json(['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$publicaciones = Publicaciones::all();
        //return view('admin/vistas/publicaciones/publicaciones', compact('publicaciones'));

        $typePublic =    Str::after($request->getPathInfo(), '/admin/');

        $path = 'admin.vistas.publicaciones.' . $typePublic .'.index';

        /* dd(auth()->user()->id); */
        /* dd($path); */
        return view($path);

    }


    public function indexinicio()
    {
        $inicio = Publicaciones::all();
        return view('publico.vistas.publicaciones.inicio', compact('inicio'));
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
        $errors = $request->validate([
            'titulo' => 'required|string',
            'contenido' => 'required|string',
            'idtipo' => 'required|exists:tipopublicaciones,id',
            'fechainicial' => 'required|date',
            'fechafinal' => 'required|date|after_or_equal:fechainicial',
            'estado' => 'required|in:0,1',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);


        /* if(!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        } */


        /* $data = $request->validated(); */



        DB::beginTransaction();
    try {
        $publicacion = Publicaciones::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'idtipo' => $request->idtipo,
            'iduser' => auth()->user()->id,
            'fechainicial' => $request->fechainicial,
            'fechafinal' => $request->fechafinal,
            'estado' => $request->estado
        ]);

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $extension = $imagen->getClientOriginalExtension();
                $nombreHash = Str::uuid() . '.' . $extension;

                // Guarda en storage/app/public/publicacionfotos
                $ruta = $imagen->storeAs('publicaciones/eventos', $nombreHash, 'public');

                DB::table('publicacionfotos')->insert([
                    'idpublicaciones' => $publicacion->id,
                    'imagen' => 'storage/publicaciones/eventos/' . $nombreHash, // Para usarlo fácilmente en las vistas
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        DB::commit();
        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
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
    public function destroy(Publicaciones $evento)
    {
        try {
            // Cambia el estado: si está activo (1) lo pone en inactivo (0), y viceversa
            $evento->estado = $evento->estado === '1' ? '0' : '1';
            $evento->save();

            return response()->json([
                'success' => true,
                'message' => 'El estado de la publicación fue actualizado correctamente.',
                'nuevo_estado' => $evento->estado == 1 ? 'Activo' : 'Inactivo'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el estado.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
