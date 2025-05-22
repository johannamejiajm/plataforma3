<?php

namespace App\Http\Controllers;

use App\Models\Donaciones;
use App\Models\Tipodonaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
      public function indexdonacion()
    {
        $tiposdonaciones = Tipodonaciones::all();
        $donaciones = donaciones::all();
        return view('publico/vistas/donaciones/index', compact('donaciones', 'tiposdonaciones'));
    }

    public function index(Request $request)
    {
        // Obtener el estado de la URL, por defecto es 'todos' si no se pasa ningún valor
        $estado = $request->get('estado', 'todos');

        // Realizar la consulta dinámica según el estado
        if ($estado == 'todos') {

            $donaciones = Donaciones::with('tipoDonacion')->get();
        } else {

            $donaciones = Donaciones::whereHas('tipoDonacion', function ($query) use ($estado) {
                if ($estado == 'aprobado') {
                    $query->where('estado', '1');
                } elseif ($estado == 'denegado') {
                    $query->where('estado', '2');
                } elseif ($estado == 'pendiente') {
                    $query->where('estado', '0');
                }
            })
            ->get();
        }

        // Pasar las donaciones filtradas y el estado actual a la vista
        return view('admin/vistas/donaciones/donaciones', compact('donaciones', 'estado'));
    }



     public function updateEstado(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:donaciones,id',
            'estado' => 'required|string',
            'soporte' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $donacion = Donaciones::findOrFail($request->id);
        $donacion->estado = $request->estado;

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

    public function store(Request $request)
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
