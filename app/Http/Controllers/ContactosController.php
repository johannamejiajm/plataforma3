<?php

namespace App\Http\Controllers;
use App\Http\Requests\Contactosrequest;
use App\Models\Contactos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

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

       DB::beginTransaction();
       try{
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

        DB::commit();

        return redirect()->route('admin.contactos')->with('success','Pagina de Contacto actualizado Exitosamente');

       }
       catch (\Exception $e){
         DB::rollback();
         Log::error('Error al actualizar contactos:' . $e->getMessage());
         return redirect()->route('admin.contactos')->with('error','ocurrio un error al actualizar la pagina de contactos');
       }
    }
}
