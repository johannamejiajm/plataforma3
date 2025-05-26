<?php

namespace App\Http\Controllers;

use App\Models\Informacioninstitucional;
use App\Models\Tipoinformacion;
use Illuminate\Http\Request;

class InformacioninstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $informaciones = Informacioninstitucional::all();
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
          $tipos = Tipoinformacion::all();
        return view('admin.vistas.publicaciones.quienessomos.quienessomos', compact('tipos'));
    }

    public function list()
    {
        $data = Informacioninstitucional::with('tipo')->get();


        return datatables()->of($data)
            ->addColumn('tipo', fn($row) => $row->tipo->tipo ?? '-')
            ->addColumn('acciones', function ($row) {
                return '
                    <button class="btn btn-sm btn-warning edit" data-id="'.$row->id.'"><i class="ti ti-pencil"></i></button>
                    <button class="btn btn-sm btn-danger delete" data-id="'.$row->id.'"><i class="ti ti-trash"></i></button>
                ';
            })
            ->rawColumns(['acciones'])
            ->make(true);
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
            $validatedData = $request->validate([
                'idtipo' => 'required|exists:tipoinformacion,id',
                'contenido' => 'required|string',
                'fechainicial' => 'required|date',
                'estado' => 'required|in:0,1',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ]);

            $info = new Informacioninstitucional();
            $info->idtipo = $request->idtipo;
            $info->contenido = $request->contenido;
            $info->fechainicial = now();
            $info->estado = $request->estado;

           if ($request->hasFile('foto')) {
            $image = $request->file('foto');

            // Nombre hasheado único
            $hashedName = $image->hashName();

            // Guarda la imagen en storage/app/public/fotos
           $info->foto = $image->storeAs('informaciones', $hashedName, 'public');

            // Guarda la ruta completa pública

            }

            $info->save();

            return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informacioninstitucional $informacioninstitucional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
          $info = Informacioninstitucional::findOrFail($id);
            return response()->json($info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $info = Informacioninstitucional::findOrFail($id);

        $validatedData = $request->validate([
        'idtipo' => 'required|exists:tipoinformacion,id',
        'contenido' => 'required|string',
        'fechainicial' => 'required|date',
        'estado' => 'required|in:0,1',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

        $info->idtipo = $request->idtipo;
        $info->contenido = $request->contenido;
        $info->estado = $request->estado;
        $info->fechainicial = $request->fechainicial;

        if ($request->hasFile('foto')) {
             $path = $request->file('foto')->store('informaciones', 'public');
            $info->foto = $path;
        }

        $info->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $info = Informacioninstitucional::findOrFail($id);

    //   $info->estado = true;
    // $info->save();

    // Eliminar la foto si existe
    if ($info->foto) {
        $fotoPath = public_path('storage/' . $info->foto);
        if (file_exists($fotoPath)) {
            unlink($fotoPath); // elimina el archivo del sistema
        }
    }

    // Elimina el registro
    $info->delete();

    return response()->json(['success' => true]);
    }
}
