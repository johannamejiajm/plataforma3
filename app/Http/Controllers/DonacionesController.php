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
    public function index()
    {
      //

        
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
    

        dd('gggg');
        $donaciones = Donaciones::create([
            'idtipo'=>3,
            'fecha'=>$request->fecha,
            'donante'=>$request->donante,
            'contacto'=>$request->contacto,
            'donacion'=>$request->donacion,
            'soporte'=>$request->soporte,
            'estado'=>3,
        ]);
        $respuesta = array(
            'mensaje'   =>"donacion registrada",
            'estado'    =>3,
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
