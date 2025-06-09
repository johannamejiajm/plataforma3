<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformacionInstitucionalRequest;
use App\Models\Informacioninstitucional;
use App\Models\Tipoinformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Storage;

class InformacioninstitucionalController extends BaseController
{

    public function __construct()
    {
        $this->middleware('permission:manage_informacion')->except('index');
    }

    public function edit($id)
    {
        $info = Informacioninstitucional::findOrFail($id);
        return response()->json($info);
    }

    // Método para actualizar la info
    public function update(InformacionInstitucionalRequest $request, $id)
    {
        try {
            $info = Informacioninstitucional::findOrFail($id);

            DB::beginTransaction();

            $info->idtipo = $request->idtipo;
            $info->contenido = $request->contenido;


            // Manejo de la foto (si se envía)
            if ($request->hasFile('foto')) {
                // Eliminar la foto anterior si existe
                if ($info->foto && Storage::disk('public')->exists($info->foto)) {
                    Storage::disk('public')->delete($info->foto);
                }


                // Guardar la nueva foto
                $info->foto = $request->file('foto')->store('informacion', 'public');
            }

            $info->save();

            DB::commit();

            return response()->json([
                'mensaje' => '¡Información actualizada exitosamente!',
            ], 200);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error al actualizar información institucional: ' . $e->getMessage());

            return response()->json([
                'mensaje' => 'Ocurrió un error al actualizar la información institucional.',
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $informaciones = Informacioninstitucional::with('tipo')->get();
        $tipos = Tipoinformacion::all();
        $url = $request->url(); // O puedes colocar la URL manualmente

        // Extraer la parte del nombre (en este caso, 'quienessomos')
        $path = parse_url($url, PHP_URL_PATH);  // Extrae el path de la URL
        $name = basename($path);  // Obtiene el nombre de la última parte del path

        $url_view = 'publico.vistas.publicaciones.' . $name;

        // dd($url_view);

        return view($url_view, compact('tipos', 'informaciones'));
    }

    public function indexadminquienessomos()
    {
        $informaciones = Informacioninstitucional::with('tipo')->get();
        $tipos = Tipoinformacion::all();
        return view('admin.vistas.publicaciones.quienessomos.quienessomos', compact('tipos', 'informaciones'));
    }


    public function create()
    {
        //
    }


    public function show(Informacioninstitucional $informacioninstitucional)
    {
        //
    }
}
