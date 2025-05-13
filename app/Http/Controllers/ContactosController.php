<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Http\Request;

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
        $contactos = Contactos::first();
        return view('admin/vistas/publicaciones/contactos/index', compact('contactos')) ;
    }

    public function actualizarContactos(Request $request)
    {

        // dd($request->all());

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


        $respuesta = array(
            'mensaje'   =>"contacto registrado",
            'estado'    =>1,
        );



        return response()->json($respuesta);


    }
}
