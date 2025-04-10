<?php

use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\ArtistasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('publico/plantilla/plantilla');
});
/* Route::get('/admin', function () {
    return view('admin/vistas/publicaciones/publicaciones');
}); */

Route::get('/api/admin/eventos', [PublicacionesController::class, 'data'])->name('publicaciones.data');


Route::middleware(['auth'])->group(function () {



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


    Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('Artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('Artistas.update');

    Route::get('/donaciones', [DonacionesController::class, 'index'])->name('donaciones.index');
    Route::get('/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
    Route::put('/donaciones/{id}', [DonacionesController::class, 'update'])->name('donaciones.update');

    Route::get('/vistas/publicaciones/inicio',[PublicacionesController::class,'indexinicio'])->name('vistaspublicacionesinicio.index');

    Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
Route::post('/artistas/{id}/cambiar-estado', [ArtistasController::class, 'cambiarEstado'])->name('artistas.cambiarEstado');

Route::get('/artistas/active', [ArtistasController::class, 'active'])->name('artistas.active');

   
   



require __DIR__.'/auth.php';
