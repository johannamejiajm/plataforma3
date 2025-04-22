<?php



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


    Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');

    Route::get('/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    Route::get('/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    Route::put('/donaciones/{id}update_estado', [DonacionesController::class, 'updateEstado'])->name('donaciones.update_estado');


    Route::get('/inicio',[PublicacionesController::class,'indexinicio'])->name('inicio.index');

    Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');
    Route::get('/artistas/activos', [ArtistasController::class, 'listarArtistasActivos'])->name('artistas.activos');

    Route::get('/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    Route::get('/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    Route::put('/donaciones/{id}', [DonacionesController::class, 'update'])->name('donaciones.update');


    Route::get('/vistas/publicaciones/inicio', [PublicacionesController::class, 'indexinicio'])->name('vistaspublicacionesinicio.index');
    Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');

    Route::get('/vistas/publicaciones/inicio',[PublicacionesController::class,'indexinicio'])->name('vistaspublicacionesinicio.index');

    Route::get('vistas/publicaciones/historia', [PublicacionesController::class, 'index'])->name('historia.index');


    Route::get('/contactos', [PublicacionesController::class, 'indexcontactos'])->name('contantos.indexcontactos');
    Route::get('/admin/contactos', [PublicacionesController::class, 'admincontactos'])->name('admin.contactos');

    Route::post('/artistas/{id}/cambiar-estado', [ArtistasController::class, 'cambiarEstado'])->name('artistas.cambiarEstado');
    Route::get('/artistas/active', [ArtistasController::class, 'active'])->name('artistas.active');


    Route::get('/publicaciones', [PublicacionesController::class, 'indexpublicaciones'])->name('publicaciones.index');
require __DIR__ . '/auth.php';
