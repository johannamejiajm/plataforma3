<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PublicacionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('publico/plantilla/plantilla');
});
Route::get('/admin', function () {
    return view('admin/plantilla/plantilla');
});


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




require __DIR__.'/auth.php';
