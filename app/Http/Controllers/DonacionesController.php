<?php

namespace App\Http\Controllers;

use App\Http\Requests\CambiarEstadoDonacionesRequest;
use App\Http\Requests\DonacionRequest;
use App\Models\Contactos;
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
        $donaciones = Donaciones::with('tipodonacion')->get();
        $tiposdonaciones = Tipodonaciones::all();
        $contacto = Contactos::first();
        return view('publico/vistas/donaciones/index', compact('donaciones', 'tiposdonaciones','contacto'));
    }

    public function index(Request $request)
    {
        $idtipo = $request->get('idtipo', 'todos');

        if ($idtipo === 'todos') {
            $donaciones = Donaciones::with('tipoDonacion')->get();
        } elseif (in_array($idtipo, ['aprobado', 'denegado', 'pendiente'])) {
            $estadoMap = [
                'pendiente' => '0',
                'aprobado'  => '1',
                'denegado'  => '2',
            ];

            $donaciones = Donaciones::where('estado', $estadoMap[$idtipo])->get();
        } else {

            $donaciones = collect();
        }

        return view('admin.vistas.donaciones.donaciones', compact('donaciones', 'idtipo'));
    }


    public function updateEstado(CambiarEstadoDonacionesRequest $request)
    {
        $request->validate([
            'id'     => ['required','integer','exists:donaciones,id'],
            'estado' => ['required','integer','in:1,2'],     // 1=aprobado, 2=denegado
            'soporte'=> ['nullable','file','mimes:jpg,jpeg,png,pdf','max:2048'],
        ]);

        $donacion = Donaciones::findOrFail($request->id);
        $donacion->estado   = $request->estado;

        // Solo si viene archivo (aprobado)
        if ($request->hasFile('soporte')) {
            $donacion->soporte = $request->file('soporte')->store('soportes', 'public');
        }

        $donacion->save();

        return response()->json(['mensaje' => 'Estado actualizado con éxito']);
    }

    public function store(DonacionRequest $request)
    {
        DB::beginTransaction();
        try {
            $donacion = Donaciones::create([
                'idtipo'        => $request->tipodonacion,
                'nombre'        => $request->nombre,
                'apellido'      => $request->apellido,
                'email'         => $request->email,
                'telefono'      => $request->telefono,
                'donacion'      => $request->donacion,
                'soporte'       => $request->hasFile('soporte')
                                ? $request->file('soporte')->store('soportes', 'public')
                                : null,
                'estado'        => 0, // 0 = pendiente
            ]);

            DB::commit();

            return response()->json([
                'mensaje' => 'Donación registrada exitosamente',
                'idtipo'  => 0,
                'donante' => "{$donacion->nombre} {$donacion->apellido}",
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json([
                'mensaje' => 'Ocurrió un error al guardar la donación.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

}
