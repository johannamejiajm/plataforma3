<?php

namespace App\Http\Controllers;
use App\Http\Requests\Contactosrequest;
use App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactos = Contactos::first();
        return view('publico/vistas/publicaciones/contacto',compact('contactos'));
    }
    public function indexAdmin()
    {
        //   if (!auth()->user()->can('manage_contactos')) {
        //     abort(403, 'No tienes permiso para actualizar contactos.');
        // }
        $contactos = Contactos::first();
        return view('admin/vistas/publicaciones/contactos/index', compact('contactos')) ;
    }

    public function actualizarContactos(Contactosrequest $request)
    {

        //   if (!auth()->user()->can('manage_contactos')) {
        //     abort(403, 'No tienes permiso para actualizar contactos.');
        // }

        // dd($request->all());
           $validator = Validator::make($request->all(), [
        'direccion' => 'required|string',
        'telefono1' => 'required|string',
        //'telefono2'  => 'nullable|string|max:20',
        'email' => 'required|email',
         // 'urlx'           => 'nullable|url|max:255',
          //  'urlinstagram'   => 'nullable|url|max:255',
        // Agrega más reglas según tus necesidades
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput()
                         ->with('error', 'Por favor, corrige los errores del formulario.');
    }

        $actualizarContactos = Contactos::first();
        $actualizarContactos->direccion = $request->direccion;
        $actualizarContactos->telefono1 = $request->telefono1;
        $actualizarContactos->telefono2 = $request->telefono2;
        $actualizarContactos->email = $request->email;
        $actualizarContactos->horario = $request->horario;
        $actualizarContactos->horarioextras = $request->horarioextras;
        $actualizarContactos->embebido = $request->embebido;
        $actualizarContactos->urlfacebook = $request->urlfacebook;
        $actualizarContactos->urlx = $request->urlx;
        $actualizarContactos->urlinstagram = $request->urlinstagram;
        $actualizarContactos->save();


        // $respuesta = array(
        //     'mensaje'   =>"contacto registrado",
        //     'estado'    =>1,
        // );



        // return response()->json($respuesta);

        return redirect()->route('admin.contactos')->with('success','Pagina de Contacto actualizado Exitosamente');


    }
}
