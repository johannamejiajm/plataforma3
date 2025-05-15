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

Route::get('/', function () {
    return view('publico/plantilla/plantilla');
})->name('inicio');
/* Route::get('/admin', function () {
    return view('admin/vistas/publicaciones/publicaciones');
}); */

//JOHAN RINCON 
Route::get('/inicio',[PublicacionesController::class,'indexinicio'])->name('inicio.index'); 

//castro
Route::middleware(['auth'])->group(function () {


//mis rutas castro
 Route::middleware(['permission:manage_publicaciones'])->group(function () {
    Route::get('/api/admin/eventos', [PublicacionesController::class, 'data'])->name('publicaciones.eventos');
    Route::get('/api/admin/historias', [PublicacionesController::class, 'data'])->name('publicaciones.historias');
    Route::get('/api/admin/noticias', [PublicacionesController::class, 'data'])->name('publicaciones.noticias');
    Route::get('/admin/dashboard', [PublicacionesController::class, 'dashboard'])->name('admin.dashboard');


    Route::resource('/admin/eventos', PublicacionesController::class);
    Route::resource('/admin/noticias', PublicacionesController::class);
    Route::resource('/admin/historias', PublicacionesController::class);


 });

 });

//mis rutas castro
 Route::middleware(['permission:manage_roles'])->group(function () {
    Route::get('/admin/roles/list', [RoleController::class, 'list'])->name('roles.list');
    Route::resource('/admin/roles', RoleController::class)->only(['index', 'store', 'update', 'destroy', 'edit']);
});

//mis rutas castro
 Route::middleware(['permission:manage_roles'])->group(function () {
    Route::get('/admin/roles/list', [RoleController::class, 'list'])->name('roles.list');
    Route::resource('/admin/roles', RoleController::class)->only(['index', 'store', 'update', 'destroy', 'edit']);
});

Route::middleware(['permission:manage_permisos'])->group(function () {
    Route::post('/admin/permiso', [RoleController::class, 'createPermission'])->name('permissions.store');
    Route::resource('/admin/permissions', PermissionController::class);
});

Route::middleware(['permission:manage_users'])->group(function () {

    Route::resource('/admin/users', UserController::class);
});
    //rutas de alexander-admin
    Route::get('/admin/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
    Route::post('/artistas/{id}/cambiar-estado', [ArtistasController::class, 'cambiarEstado'])->name('artistas.cambiarEstado');



// Rutas santiago - Historia
    Route::get('/historia', [PublicacionesController::class, 'indexhistoria'])->name('historia.index');

    //Ruta santiago - eventos
     Route::get('/eventos', [PublicacionesController::class, 'indexeventos'])->name('publica.eventos.index');
     Route::get('/eventos/{id}', [PublicacionesController::class, 'indexevento'])->name('publica.evento');

 // Ruta principal del CRUD de eventos
Route::get('admin/event', [EventosController::class, 'index'])->name('eventos.indexx');
// Ruta para guardar un nuevo evento (desde el modal)
Route::post('/event', [EventosController::class, 'store'])->name('eventos.storee');
// Mostrar un evento individual (opcional)
Route::get('/event/{id}', [EventosController::class, 'show'])->name('eventos.showe');

// Traer los datos para editar (usado vía AJAX)
Route::get('/event/{id}/edit', [EventosController::class, 'edit'])->name('eventos.edite');


// Actualizar un evento existente
Route::put('/event/{id}', [EventosController::class, 'update'])->name('eventos.updated');

// Eliminar un evento
Route::delete('/event/{id}', [EventosController::class, 'destroy'])->name('eventos.destroyed');


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




    Route::get('/quienessomos', [InformacioninstitucionalController::class, 'index'])->name('quienessomos.index');
    Route::get('/editquienessomos/{id}/edit', [InformacioninstitucionalController::class, 'edit'])->name('quienessomos.edit');
    Route::put('/quienessomos/{id}', [InformacioninstitucionalController::class, 'update'])->name('quienessomos.update');


    Route::get('/admin/quienessomos', [InformacioninstitucionalController::class, 'indexadminquienessomos'])->name('quienessomos.indexadmin');
    Route::get('/admin/quienessomos/list', [InformacioninstitucionalController::class, 'list'])->name('quienessomos.list');
    Route::post('/admin/quienessomos/store', [InformacioninstitucionalController::class, 'store'])->name('quienessomos.store');
    Route::get('/admin/quienessomos/edit/{id}', [InformacioninstitucionalController::class, 'edit'])->name('quienessomos.edit');
    Route::post('/admin/quienessomos/update/{id}', [InformacioninstitucionalController::class, 'update'])->name('quienessomos.update');
    Route::delete('/admin/quienessomos/delete/{id}', [InformacioninstitucionalController::class, 'destroy'])->name('quienessomos.delete');


    Route::middleware('auth')->group(function (){

    Route::get('/donacionesindex', [DonacionesController::class, 'indexdonacion'])->name('donacionesindex.index');
    Route::post('/donaciones', [DonacionesController::class, 'store'])->name('donaciones.store');

    Route::get('/contactos', [ContactosController::class, 'index'])->name('contantos.indexcontactos');



    //Rutas Midas - Publico Publicaciones
    Route::get('/publicaciones', [PublicacionesController::class, 'indexpublicaciones'])->name('publicaciones.index');
    Route::get('/publico/publicaciones', [PublicacionesController::class, 'indexpublicacionespublico'])->name('publicaciones.indexpublicacionespublico');

    Route::middleware('auth')->group(function (){

    Route::get('/admin/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    Route::get('/admin/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    Route::put('/admin/donaciones/{id}update_estado', [DonacionesController::class, 'updateEstado'])->name('donaciones.update_estado');



    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');
    Route::get('/artistas/activos', [ArtistasController::class, 'listarArtistasActivos'])->name('artistas.activos');


    Route::get('/vistas/publicaciones/inicio', [PublicacionesController::class, 'indexinicio'])->name('vistaspublicacionesinicio.index');

    Route::get('/vistas/publicaciones/inicio',[PublicacionesController::class,'indexinicio'])->name('vistaspublicacionesinicio.index');


    Route::get('/contactos', [ContactosController::class, 'index'])->name('contantos.indexcontactos');

    Route::get('/admin/contactos', [ContactosController::class, 'indexAdmin'])->name('admin.contactos');
    Route::post('/admin/contactos', [ContactosController::class, 'actualizarContactos'])->name('contactos.actualizarcontactos');

    Route::post('/artistas/{id}/cambiar-estado', [ArtistasController::class, 'cambiarEstado'])->name('artistas.cambiarEstado');


    Route::get('/artistas/active', [ArtistasController::class, 'active'])->name('artistas.active');

    });
      
    
  
    //Rutas Juan Sebastian - Publico
    Route::get('publico/artistas/crear', [ArtistasController::class, 'create'])->name('artistas.create');
    Route::post('/artistas', [ArtistasController::class, 'store'])->name('artistas.store');
      
    //Rutas Midas - Publico Publicaciones
    Route::get('/publicaciones', [PublicacionesController::class, 'indexpublicaciones'])->name('publicaciones.index');
    Route::get('/publico/publicaciones', [PublicacionesController::class, 'indexpublicacionespublico'])->name('publicaciones.indexpublicacionespublico');

    
    Route::get('/donacionesindex', [DonacionesController::class, 'indexdonacion'])->name('donacionesindex.index');
    Route::post('/donaciones', [DonacionesController::class, 'store'])->name('donaciones.store');



require __DIR__ . '/auth.php';
