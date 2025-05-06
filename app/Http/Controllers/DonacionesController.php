<?php

namespace App\Http\Controllers;

use App\Models\Donaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function indexdonacion()
    {
        $donaciones = donaciones::all();
        return view('publico/vistas/donaciones/index', compact('donaciones'));

        
    }
   
      //

        
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
        // $donacion = new Donaciones(); // Cambia "donaciones" a "Donacion"
        // $donacion->fecha = $request->input('fecha');
        // $donacion->donante = $request->input('donante');
        // $donacion->contacto = $request->input('contacto');
        // $donacion->donacion = $request->input('donacion');
        // $donacion->soporte = $request->input('soporte');
        // $donacion->idtipo = $request->input('idtipo');
        // $donacion->save();
    
        // // Envía notificación al administrador (ejemplo con Mail)
        // Mail::raw('Se ha recibido una nueva donación.', function ($message) {
        //     $message->to('admin@example.com')->subject('Nueva Donación');
        // });
    
        // // Envía mensaje de WhatsApp al tesorero (necesitas una API de WhatsApp)
        // // ... (Implementación de la API de WhatsApp)
    
        // return redirect()->route('donaciones.store')->with('success', 'Donación registrada correctamente.');
    

       
        
        $donaciones = Donaciones::create([
            'idtipo'=>2,
            'fecha'=>$request->fecha,
            'donante'=>$request->donante,
            'contacto'=>$request->contacto,
            'donacion'=>$request->donacion,
            'soporte'=>$request->soporte,
            'estado'=>2,
            
        ]);
       
        $respuesta = array(
            'mensaje'   =>"donacion registrada",
            'estado'    =>2,
        ) ;
        return response()->json($respuesta);

        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Donaciones $donaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donaciones $donaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donaciones $donaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donaciones $donaciones)
    {
        //
    }
}
