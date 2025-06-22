<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicacionRequest;
use App\Models\Contactos;
use App\Models\Evento;
use App\Models\Publicaciones;
use App\Models\Publicacionfotos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Tipopublicaciones;
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

        $contacto = Contactos::first();

        return view('publico.vistas.publicaciones.publicaciones', compact('publicaciones', 'contacto'));
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
        $contacto = Contactos::first();
        return view('publico.vistas.publicaciones.historia', compact('historias', 'contacto'));

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
    $contacto = Contactos::first();
    
    return view('publico.vistas.publicaciones.eventos', compact('eventos', 'contacto'));
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicacionRequest $request)
    {


        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso.');
        // }


        $typePublic = Str::after($request->getPathInfo(), '/admin/publicaciones/');

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

                $imagenRedimensionada = ImageManager::gd()->read($imagen)
                    ->cover(800, 400 )
                    ->encode(new AutoEncoder(quality: 90));


                $rutaCarpeta = 'publicaciones/' . $typePublic;

                $rutaFinal = $rutaCarpeta . '/' . $nombreHash;
                Storage::disk('public')->put($rutaFinal, (string) $imagenRedimensionada);

                DB::table('publicacionfotos')->insert([
                    'idpublicaciones' => $publicacion->id,
                    'imagen' => 'storage/' . $rutaFinal,
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
    public function update(PublicacionRequest $request, Publicaciones $publicaciones)
    {

        // if (!Auth::user()->can('manage_publicaciones')) {
        //     abort(403, 'No tienes permiso.');
        // }




    $typePublic = $request->segment(3);
     DB::beginTransaction();


     try {

         $publicaciones->update([
             'titulo' => $request->titulo,
             'idtipo' => $request->idtipo,
             'iduser' => auth()->user()->id,
             'contenido' => $request->contenido,
             'fechainicial' => $request->fechainicial,
             'fechafinal' => $request->fechafinal,
             'estado' => $request->estado
         ]);




            if ($request->hasFile('imagenes')) {


            $imagenesAnteriores = DB::table('publicacionfotos')
            ->where('idpublicaciones', $publicaciones->id)
            ->get();

            foreach ($imagenesAnteriores as $img) {
                $rutaFisica = public_path($img->imagen);
                if (file_exists($rutaFisica)) {
                    unlink($rutaFisica);
                }
            }


             DB::table('publicacionfotos')
                ->where('idpublicaciones', $publicaciones->id)
                ->delete();

             foreach ($request->file('imagenes') as $imagen) {
                 $extension = $imagen->getClientOriginalExtension();
                 $nombreHash = Str::uuid() . '.' . $extension;




                $imagenRedimensionada = ImageManager::gd()->read($imagen)
                    ->cover(800, 400)
                    ->encode(new AutoEncoder(quality: 90));

                $rutaCarpeta = 'publicaciones/' . $typePublic;
                $rutaFinal = $rutaCarpeta . '/' . $nombreHash;


                Storage::disk('public')->put($rutaFinal, (string) $imagenRedimensionada);

                 DB::table('publicacionfotos')->insert([
                     'idpublicaciones' => $publicaciones->id,
                    'imagen' => 'storage/' . $rutaFinal,
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


        try {

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
