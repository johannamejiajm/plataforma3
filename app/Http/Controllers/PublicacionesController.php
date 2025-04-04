<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PublicacionesController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

       /*  dd(ltrim($request->getPathInfo(), '/admin')); */

       $typePublic =    Str::after($request->getPathInfo(), '/admin/');

        $path = 'admin.' . $typePublic .'.index';

        /* dd($path); */
        return view($path);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicaciones $publicaciones)
    {
        //
    }
}
