<?php



use App\Http\Controllers\ContactosController;
use App\Http\Controllers\InformacioninstitucionalController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('publico/plantilla/plantilla');
})->name('inicio');
/* Route::get('/admin', function () {
    return view('admin/vistas/publicaciones/publicaciones');
}); */



Route::middleware(['auth'])->group(function () {


    Route::get('/api/admin/eventos', [PublicacionesController::class, 'data'])->name('publicaciones.eventos');
    Route::get('/api/admin/historias', [PublicacionesController::class, 'data'])->name('publicaciones.historias');
    Route::get('/api/admin/noticias', [PublicacionesController::class, 'data'])->name('publicaciones.noticias');


    Route::get('/admin/dashboard', [PublicacionesController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/eventos', PublicacionesController::class);
    Route::resource('/admin/noticias', PublicacionesController::class);
    Route::resource('/admin/historias', PublicacionesController::class);








    //rutas de alexander-admin
    Route::get('/admin/artistas', [ArtistasController::class, 'index'])->name('artistas.index');

});




/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    Route::get('/donacionesindex', [DonacionesController::class, 'indexdonacion'])->name('donacionesindex.index');
    Route::post('/donaciones', [DonacionesController::class, 'store'])->name('donaciones.store');

    Route::get('/quienessomos', [InformacioninstitucionalController::class, 'index'])->name('quienessomos.index');
    Route::get('/editquienessomos/{id}/edit', [InformacioninstitucionalController::class, 'edit'])->name('quienessomos.edit');
    Route::put('/quienessomos/{id}', [InformacioninstitucionalController::class, 'update'])->name('quienessomos.update');
    Route::get('/admin/quienessomos', [InformacioninstitucionalController::class, 'indexadminquienessomos'])->name('quienessomos.indexadmin');



    
// Mostrar formulario para crear un nuevo artista
Route::get('/artistas/create', [ArtistasController::class, 'create'])->name('artistas.create');// Guardar artista en la base de datos
Route::post('/artistas', [ArtistasController::class, 'store'])->name('artistas.store');


  
    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');

    Route::middleware('auth')->group(function () {

    Route::get('/admin/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    Route::get('/admin/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    Route::put('/admin/donaciones/{id}update_estado', [DonacionesController::class, 'updateEstado'])->name('donaciones.update_estado');

});
    Route::get('/inicio',[PublicacionesController::class,'indexinicio'])->name('inicio.index');

   
    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');
    Route::get('/artistas/activos', [ArtistasController::class, 'listarArtistasActivos'])->name('artistas.activos');

    // Route::get('/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    // Route::get('/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    // Route::put('/donaciones/{id}', [DonacionesController::class, 'update'])->name('donaciones.update');


    Route::get('/vistas/publicaciones/inicio', [PublicacionesController::class, 'indexinicio'])->name('vistaspublicacionesinicio.index');
   

    Route::get('/vistas/publicaciones/inicio',[PublicacionesController::class,'indexinicio'])->name('vistaspublicacionesinicio.index');

    Route::get('/historia', [PublicacionesController::class, 'indexhistoria'])->name('historia.index');


    Route::get('/contactos', [ContactosController::class, 'index'])->name('contantos.indexcontactos');
    Route::post('/contactos/actualizar', [ContactosController::class, 'actualizarContactos'])->name('contantos.actualizarcontactos');
    Route::get('/admin/contactos', [ContactosController::class, 'indexAdmin'])->name('admin.contactos');

    Route::post('/artistas/{id}/cambiar-estado', [ArtistasController::class, 'cambiarEstado'])->name('artistas.cambiarEstado');
    Route::get('/artistas/active', [ArtistasController::class, 'active'])->name('artistas.active');


    //rutas Midas - publico
    Route::get('/publicaciones', [PublicacionesController::class, 'indexpublicaciones'])->name('publicaciones.index');
    Route::get('/publico/publicaciones', [PublicacionesController::class, 'indexpublicacionespublico'])->name('publicaciones.indexpublicacionespublico');
    
require __DIR__ . '/auth.php';
