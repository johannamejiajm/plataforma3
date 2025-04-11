<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas.index');
    Route::get('/editArtistas/{id}/edit', [ArtistasController::class, 'edit'])->name('artistas.edit');
    Route::put('/Artistas/{id}', [ArtistasController::class, 'update'])->name('artistas.update');

    // Route::put('/Artistas/{id}', [ArtistasController::class, 'store'])->name('Artistas.store');

    // Ruta para mostrar el formulario (asumo que ya existe)
    Route::get('/artistas/crear', [ArtistasController::class, 'create'])->name('artistas.create');
    Route::post('/artistas', [ArtistasController::class, 'store'])->name('artistas.store');


require __DIR__.'/auth.php';
