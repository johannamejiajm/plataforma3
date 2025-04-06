<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        //


       /* $publicaciones = Publicaciones::all(); */



        $typePublic =    Str::after($request->getPathInfo(), '/admin/');

        $path = 'admin.vistas.publicaciones.' . $typePublic .'.index';

        /* dd($path); */
        return view($path);

        /* return view('admin/vistas/publicaciones/publicaciones', compact('publicaciones')); */
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
