<?php

use App\Http\Controllers\ContactosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\InformacioninstitucionalController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Artisan;

Route::get('/',[PublicacionesController::class,'indexinicio'])->name('inicio.index');
Route::get('/publico/inicio',[PublicacionesController::class,'indexinicio']);
Route::get('/publico/quienessomos', [InformacioninstitucionalController::class, 'index'])->name('quienessomos.index');
Route::get('/publico/historia', [PublicacionesController::class, 'indexhistoria'])->name('historia.index');
Route::get('/publico/publicaciones', [PublicacionesController::class, 'indexpublicacionespublico'])->name('publicaciones.indexpublicacionespublico');
Route::get('/publico/eventos', [PublicacionesController::class, 'indexeventos'])->name('publica.eventos.index');
Route::get('/publico/artistas/crear', [ArtistasController::class, 'create'])->name('artistas.create');
Route::post('/publico/artistas', [ArtistasController::class, 'store'])->name('artistas.store');
Route::get('/publico/artistas', [ArtistasController::class, 'listarArtistasActivos'])->name('artistas.activos');
Route::get('/publico/donacionesindex', [DonacionesController::class, 'indexdonacion'])->name('donacionesindex.index');
Route::post('/donaciones', [DonacionesController::class, 'store'])->name('donaciones.store');
Route::get('/publico/contactos', [ContactosController::class, 'index'])->name('contantos.indexcontactos');
Route::get('/eventos/{id}', [PublicacionesController::class, 'indexevento'])->name('publica.evento');


Route::middleware(['auth'])->group(function () {
    //Rutas eventos administrador
    Route::get('/admin/eventos', [EventosController::class, 'index'])->name('eventos.index');
    Route::post('/admin/eventos', [EventosController::class, 'store'])->name('eventos.store');
    //Route::get('/admin/eventos/{id}', [EventosController::class, 'show'])->name('eventos.show');
    Route::get('/admin/eventos/{id}/edit', [EventosController::class, 'edit'])->name('eventos.edit');
    Route::put('/admin/eventos/{id}', [EventosController::class, 'update'])->name('eventos.update');
    Route::delete('/admin/eventos/{id}', [EventosController::class, 'destroy'])->name('eventos.destroy');

    //Rutas publicar eventos
    Route::resource('/admin/publicaciones/eventos', PublicacionesController::class)->names('admin.publicaciones.eventos');

    //Rutas publicar noticias
    Route::resource('/admin/publicaciones/noticias', PublicacionesController::class)->names('admin.publicaciones.noticias');

     //Rutas publicar historias
    Route::resource('/admin/publicaciones/historias', PublicacionesController::class)->names('admin.publicaciones.historias');

    /*Route::post('/admin/historias', [PublicacionesController::class,'store'])->name('publicaciones.store');
    Route::get('/admin/historias/{id}', [PublicacionesController::class,'show'])->name('publicaciones.show');
    Route::get('/admin/historias/{id}/edit', [PublicacionesController::class,'edit'])->name('publicaciones.edit');
    Route::put('/admin/historias/{id}', [PublicacionesController::class,'update'])->name('publicaciones.update');
    Route::delete('/admin/historias/{id}', [PublicacionesController::class,'destroy'])->name('publicaciones.destroy');*/

    //Rutas obtener informacion publicaciones
    Route::get('/api/admin/eventos', [PublicacionesController::class, 'data'])->name('publicaciones.eventos');
    Route::get('/api/admin/historias', [PublicacionesController::class, 'data'])->name('publicaciones.historias');
    Route::get('/api/admin/noticias', [PublicacionesController::class, 'data'])->name('publicaciones.noticias');
    Route::get('/admin/dashboard', [PublicacionesController::class, 'dashboard'])->name('admin.dashboard');

    //Rutas modulo artistas
    Route::get('/admin/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
    Route::post('/admin/artistas/{id}/cambiar-estado', [ArtistasController::class, 'cambiarEstado'])->name('artistas.cambiarEstado');
    // Route::get('/admin/artistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    // Route::put('/admin/artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');

    //Rutas información institucional
    Route::get('/admin/quienessomos', [InformacioninstitucionalController::class, 'indexadminquienessomos'])->name('quienessomos.indexadmin');
    Route::get('/admin/quienessomos/list', [InformacioninstitucionalController::class, 'list'])->name('quienessomos.list');
    Route::post('/admin/quienessomos/store', [InformacioninstitucionalController::class, 'store'])->name('quienessomos.store');
    Route::get('/admin/quienessomos/edit/{id}', [InformacioninstitucionalController::class, 'edit'])->name('quienessomos.edit');
    Route::put('/admin/quienessomos/update/{id}', [InformacioninstitucionalController::class, 'update'])->name('quienessomos.update');
    Route::delete('/admin/quienessomos/delete/{id}', [InformacioninstitucionalController::class, 'destroy'])->name('quienessomos.delete');


    //Rutas donaciones
    Route::get('/admin/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    Route::get('/admin/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    Route::put('/admin/donaciones/{id}update_estado', [DonacionesController::class, 'updateEstado'])->name('donaciones.update_estado');

    //Rutas contactos
    Route::get('/admin/contactos', [ContactosController::class, 'indexAdmin'])->name('admin.contactos');
    Route::post('/admin/contactos', [ContactosController::class, 'actualizarContactos'])->name('contactos.actualizarcontactos');
    //Rutas roles
    Route::get('/admin/roles/list', [RoleController::class, 'list'])->name('roles.list');
    Route::post('/admin/permiso', [RoleController::class, 'createPermission'])->name('permissions.store');
    Route::resource('/admin/roles', RoleController::class)->only(['index', 'store', 'update', 'destroy', 'edit']);

    //Rutas permisos
    Route::resource('/admin/permisos', PermissionController::class);

    //Rutas usuarios
    Route::resource('/admin/usuarios', UserController::class);

    //Rutas perfil
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });
require __DIR__ . '/auth.php';
