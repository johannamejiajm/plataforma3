<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonacionRequest;
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
        $donaciones = Donaciones::all();
        $tiposdonaciones = Tipodonaciones::all();
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

                // dd($estado);
                if ($estado == 'aprobado') {
                    $query->where('idtipo', '1');
                } elseif ($estado == 'denegado') {
                    $query->where('idtipo', '2');
                } elseif ($estado == 'pendiente') {
                    $query->where('idtipo', '0');
                }
            })
            ->get();

            // dd($donaciones);
        }

        // Pasar las donaciones filtradas y el estado actual a la vista
        return view('admin.vistas.donaciones.donaciones', compact('donaciones', 'estado'));
    }
   

    public function updateEstado(Request $request, $id)
    {
        $donacion = Donaciones::findOrFail($id);
    
        $estado = $request->estado;
    
        $donacion->estado = $estado;
    
        // Asignar tipo de donación basado en estado
        switch ($estado) {
            case 1: // Aprobado
                $donacion->idtipo = 1;
                break;
            case 2: // Denegado
                $donacion->idtipo = 2;
                break;
            default: // Pendiente u otros
                $donacion->idtipo = 0;
                break;
        }
    
        $donacion->save();
    
        return redirect()->route('donaciones.index')->with('success', 'Donación actualizada.');
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
