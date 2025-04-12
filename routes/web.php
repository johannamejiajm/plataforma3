<?php

use App\Http\Controllers\DonacionesController;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionesController;
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

Route::get('/donaciones', [DonacionesController::class, 'indexdonacion'])->name('donaciones.index');
Route::get('/editdonaciones/{id}/edit', [DonacionesController::class, 'edit'])->name('donaciones.edit');
Route::put('/donaciones/{id}', [DonacionesController::class, 'update'])->name('donaciones.update');
Route::post('/donaciones', [DonacionesController::class, 'store'])->name('donaciones.store');





require __DIR__ . '/auth.php';
