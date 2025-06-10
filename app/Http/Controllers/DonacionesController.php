<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonacionRequest;
use App\Models\Donaciones;
use App\Models\Tipodonaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller as BaseController;

class DonacionesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('permission:manage_donaciones')->except(['indexdonacion','store']);
    }
     public function indexdonacion()
    {
        $donaciones = Donaciones::all();
        $tiposdonaciones = Tipodonaciones::all();
        return view('publico/vistas/donaciones/index', compact('donaciones', 'tiposdonaciones'));
    }

    public function index(Request $request)
    {
        // Obtener el estado de la URL, por defecto es 'todos' si no se pasa ningún valor
        $idtipo = $request->get('idtipo', 'todos');

        // Realizar la consulta dinámica según el estado
        if ($idtipo == 'todos') {

            $donaciones = Donaciones::with('tipoDonacion')->get();
        } else {

            $donaciones = Donaciones::whereHas('tipoDonacion', function ($query) use ($idtipo) {
                if ($idtipo == 'aprobado') {
                    $query->where('idtipo', '1');
                } elseif ($idtipo == 'denegado') {
                    $query->where('idtipo', '2');
                } elseif ($idtipo == 'pendiente') {
                    $query->where('idtipo', '0');
                }
            })
            ->get();
        }

        // Pasar las donaciones filtradas y el estado actual a la vista
        return view('admin/vistas/donaciones/donaciones', compact('donaciones', 'idtipo'));
    }

    public function updateEstado(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:donaciones,id',
            'idtipo' => 'required|string',
            'soporte' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $donacion = Donaciones::findOrFail($request->id);
        $donacion->idtipo = $request->idtipo;

        // Si viene archivo, lo guardamos
        if ($request->hasFile('soporte')) {
            $archivo = $request->file('soporte');

            // Guarda el archivo en storage/app/public/soportes
            $ruta = $archivo->store('soportes', 'public');

            // Guarda la ruta en la base de datos
            $donacion->soporte = 'storage/' . $ruta;
        }

        $donacion->save();

        return redirect('/donaciones');
    }

    public function store(DonacionRequest $request)
    {
        DB::beginTransaction();
        try {
            $donaciones = Donaciones::create([
                'idtipo'   => $request->idtipo,
                'nombre'   => $request->nombre,
                'apellido' => $request->apellido,
                'email'    => $request->email,
                'telefono' => $request->telefono,
                'donacion' => $request->donacion,
                'estado'   => '0',
            ]);

            DB::commit();

            return response()->json([
                'mensaje'   => "Donación registrada exitosamente",
                'estado'    => 0,
                'donante'   => $donaciones->nombre . ' ' . $donaciones->apellido,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error al registrar donación: '.$e->getMessage());
            return response()->json([
                'mensaje' => 'Ocurrió un error al guardar la donación.',
                'estado'  => 1,
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
