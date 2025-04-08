<?php

use App\Http\Controllers\InformacioninstitucionalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionesController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('publico/plantilla/plantilla');
})->name('inicio');
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

    Route::get('/quienessomos', [InformacioninstitucionalController::class, 'index'])->name('quienessomos.index');
    Route::get('/editquienessomos/{id}/edit', [InformacioninstitucionalController::class, 'edit'])->name('quienessomos.edit');
    Route::put('/quienessomos/{id}', [InformacioninstitucionalController::class, 'update'])->name('quienessomos.update');



require __DIR__.'/auth.php';
