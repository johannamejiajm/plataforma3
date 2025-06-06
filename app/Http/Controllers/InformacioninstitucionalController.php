<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformacionInstitucionalRequest;
use App\Models\Informacioninstitucional;
use App\Models\Tipoinformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InformacioninstitucionalController extends Controller
{


     // Método para mostrar la info en el formulario de edición (opcional si no usas formulario separado)
    public function edit($id)
    {
        $info = Informacioninstitucional::findOrFail($id);
        return response()->json($info);
    }

    // Método para actualizar la info
    public function update(InformacionInstitucionalRequest $request, $id)
    {
        $info = Informacioninstitucional::findOrFail($id);

       DB::beginTransaction();
       try{
        if ($request->hasFile('foto')) {
        // Eliminar foto anterior si existe
        if ($info->foto && \Storage::disk('public')->exists($info->foto)) {
            \Storage::disk('public')->delete($info->foto);
        }

        // Guardar la nueva foto en la carpeta 'informacion'
        $path = $request->file('foto')->store('informacion', 'public');
        $info->foto = $path;
    }

        $info->save();

        DB::commit();

        return redirect()->back()->with('success', '¡Información actualizada exitosamente!');

       }
       catch (\Exception $e){
         DB::rollback();
         Log::error('Error al actualizar contactos:' . $e->getMessage());
         return redirect()->route('quienessomos.indexadmin')->with('error','ocurrio un error al actualizar la informacion institucional');
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

    public function indexadminquienessomos(){
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
