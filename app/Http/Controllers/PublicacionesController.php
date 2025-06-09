<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicacionRequest;
use App\Models\Evento;
use App\Models\Publicaciones;
use App\Models\Publicacionfotos;
use App\Models\Publicionesfoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tipopublicaciones;
use Illuminate\Support\Facades\Auth;
/* use Intervention\Image\Facades\Image; */
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\AutoEncoder;
use Illuminate\Routing\Controller as BaseController;

class PublicacionesController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:manage_publicaciones')->except(['indexpublicacionespublico','indexeventos','indexhistoria','indexinicio','indexevento']);
    }
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function data(Request $request)
    {
        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso para obtener publicaciones.');
        // }

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

    public function index(Request $request)
    {
        $typePublic =    Str::after($request->getPathInfo(), '/admin/publicaciones/');
        $path = 'admin.vistas.publicaciones.' . $typePublic .'.index';

        return view($path);
    }

    public function indexpublicacionespublico()
    {
        $publicaciones = Publicaciones::where('estado', '1')
            ->whereIn('idtipo', [1, 2]) 
            ->with(['fotos', 'tipo'])
            ->get();
        return view('publico.vistas.publicaciones.publicaciones', compact('publicaciones'));
    }

    public function indexinicio()
    {
        $publicaciones = Publicaciones::latest()->where('idtipo', operator: 2)->take(3)->get();
        $publicacionfotos = Publicacionfotos::latest()->where('idpublicaciones', 2)->take(3)->get();

        $noticias = Publicaciones::latest()->where('idtipo', operator: 1)->take(3)->get();
        $fotosnoticias = Publicacionfotos::latest()->where('idpublicaciones', 1)->take(3)->get();

        $eventos = Publicaciones::latest()->where('idtipo', operator: 3)->take(3)->get();
        $fotoseventos = Publicacionfotos::latest()->where('idpublicaciones', 3)->take(3)->get();

        $inicio = Publicaciones::all();
        return view('publico.vistas.publicaciones.inicio', compact('inicio','publicaciones', 'noticias', 'eventos'));
    }

    public function indexhistoria()
    {

        $historias = Publicaciones::where('estado', '1')
                ->where('idtipo', 3)
                ->with('fotos') // asegura que las fotos se cargan
                ->latest()
                ->paginate(9);
        return view('publico.vistas.publicaciones.historia', compact('historias'));

    }
    public function indexpublicaciones()
    {
         $publicaciones = Publicaciones::where('estado', '1')
                ->where('idtipo', 3)
                ->with('fotos') // asegura que las fotos se cargan
                ->latest()
                ->paginate(9);

    }


   public function indexeventos()
   {
    $eventos = Evento::all();
    return view('publico.vistas.publicaciones.eventos', compact('eventos'));


   }

   public function indexevento($id)
    {
        $evento = Publicaciones::with(['fotos', 'tipo'])->findOrFail($id);
        return view('publico.vistas.publicaciones.detalleevento', compact('evento'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('clientes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso.');
        // }


        $typePublic = Str::after($request->getPathInfo(), '/admin/publicaciones/');
        $errors = $request->validate([
            'titulo' => 'required|string',
            'contenido' => 'required|string',
            'idtipo' => 'required|exists:tipopublicaciones,id',
            'fechainicial' => 'required|date',
            'fechafinal' => 'required|date|after_or_equal:fechainicial',
            'estado' => 'required|in:0,1',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
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
                /* $ruta = $imagen->storeAs('publicaciones/' . $typePublic, $nombreHash, 'public'); */





                 // Redimensionar la imagen con Intervention
                $imagenRedimensionada = ImageManager::gd()->read($imagen)
                    ->cover(800, 400 )
                    ->encode(new AutoEncoder(quality: 90));

                // Guardar imagen redimensionada
                $rutaCarpeta = 'publicaciones/' . $typePublic;
                /* Storage::disk('public')->makeDirectory($rutaCarpeta); */
                $rutaFinal = $rutaCarpeta . '/' . $nombreHash;
                Storage::disk('public')->put($rutaFinal, (string) $imagenRedimensionada);

                DB::table('publicacionfotos')->insert([
                    'idpublicaciones' => $publicacion->id,
                    'imagen' => 'storage/' . $rutaFinal,
                   /*  'imagen' => 'storage/publicaciones/' . $typePublic . "/" . $nombreHash, // Para usarlo fácilmente en las vistas */
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
        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso.');
        // }
        //$publicaciones = Publicaciones::find($id);
        $publicaciones->load('fotos');
        return response()->json([
            'id' => $publicaciones->id,
            'idtipo' => $publicaciones->idtipo,
            'titulo' => $publicaciones->titulo,
            'contenido' => $publicaciones->contenido,
            'fechainicial' => $publicaciones->fechainicial ? Carbon::parse($publicaciones->fechainicial)->format('Y-m-d\TH:i') : null,
            'fechafinal' => $publicaciones->fechafinal ? Carbon::parse($publicaciones->fechafinal)->format('Y-m-d\TH:i') : null,
            'estado' => $publicaciones->estado,
            'imagenes' => $publicaciones->fotos->map(function ($foto) {
                return [
                    'id' => $foto->id,
                    'ruta' => $foto->imagen
                ];
            }),
        ]);
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
    public function update(Request $request, Publicaciones $publicaciones)
    {

        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso.');
        // }

    $errors = $request->validate([
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string',
        'idtipo' => 'required|exists:tipopublicaciones,id',
        'fechainicial' => 'required|date',
        'fechafinal' => 'required|date|after_or_equal:fechainicial',
        'estado' => 'required|in:0,1',
        'imagenes.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048'
    ]);

     /* $typePublic = Str::after($request->getPathInfo(), '/admin/publicaciones/'); */
    $typePublic = $request->segment(3);
     DB::beginTransaction();

    // $publicaciones = Publicaciones::find($id);
     try {
         // Actualizar los datos principales
         $publicaciones->update([
             'titulo' => $request->titulo,
             'idtipo' => $request->idtipo,
             'iduser' => auth()->user()->id,
             'contenido' => $request->contenido,
             'fechainicial' => $request->fechainicial,
             'fechafinal' => $request->fechafinal,
             'estado' => $request->estado
         ]);



            // Guardar nuevas imágenes
            if ($request->hasFile('imagenes')) {

                // Eliminar imágenes anteriores
            $imagenesAnteriores = DB::table('publicacionfotos')
            ->where('idpublicaciones', $publicaciones->id)
            ->get();

            foreach ($imagenesAnteriores as $img) {
                $rutaFisica = public_path($img->imagen);
                if (file_exists($rutaFisica)) {
                    unlink($rutaFisica); // Elimina del sistema de archivos
                }
            }

            // Elimina los registros de la base de datos
             DB::table('publicacionfotos')
                ->where('idpublicaciones', $publicaciones->id)
                ->delete();

             foreach ($request->file('imagenes') as $imagen) {
                 $extension = $imagen->getClientOriginalExtension();
                 $nombreHash = Str::uuid() . '.' . $extension;

               /*   $ruta = $imagen->storeAs('publicaciones/' . $typePublic, $nombreHash, 'public'); */

               // Redimensionar la imagen con Intervention Image 3.x
                $imagenRedimensionada = ImageManager::gd()->read($imagen)
                    ->cover(800, 400)  // Redimensionar a 800x400
                    ->encode(new AutoEncoder(quality: 90)); // Codificar con buena calidad (90%)

                $rutaCarpeta = 'publicaciones/' . $typePublic;
                $rutaFinal = $rutaCarpeta . '/' . $nombreHash;

                // Guardar la imagen redimensionada
                Storage::disk('public')->put($rutaFinal, (string) $imagenRedimensionada);

                 DB::table('publicacionfotos')->insert([
                     'idpublicaciones' => $publicaciones->id,
                    'imagen' => 'storage/' . $rutaFinal,
                     /* 'imagen' => 'storage/publicaciones/' . $typePublic . '/' . $nombreHash, */
                     'created_at' => now(),
                     'updated_at' => now()
                 ]);
             }
         }

         DB::commit();
         return response()->json(['success' => true, 'message' => 'Evento actualizado correctamente.']);

     } catch (\Exception $e) {
         DB::rollBack();
         return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
     }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicaciones $evento)
    {
        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso.');
        // }

        //$evento = Publicaciones::find($id);
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
