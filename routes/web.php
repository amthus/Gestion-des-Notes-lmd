<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ECController;
use app\Http\Controllers\UEController   ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    // Routes pour les Éléments Constitutifs (EC)
    Route::get('/ecs', [ECController::class, 'index'])->name('ecs.index');
    Route::get('/ecs/create', [ECController::class, 'create'])->name('ecs.create');
    Route::post('/ecs', [ECController::class, 'store'])->name('ecs.store');
    Route::get('/ecs/{ec}/edit', [ECController::class, 'edit'])->name('ecs.edit');
    Route::put('/ecs/{ec}', [ECController::class, 'update'])->name('ecs.update');
    Route::delete('/ecs/{ec}', [ECController::class, 'destroy'])->name('ecs.destroy');
   
    // Routes pour les Unités d'Enseignement (UE)

    Route::get('/ues', [UEController::class, 'index'])->name('ues.index');
    Route::get('/ues/create', [UEController::class, 'create'])->name('ues.create');
    Route::post('/ues', [UEController::class, 'store'])->name('ues.store');
    Route::get('/ues/{ue}/edit', [UEController::class, 'edit'])->name('ues.edit');
    Route::put('/ues/{ue}', [UEController::class, 'update'])->name('ues.update');
    Route::delete('/ues/{ue}', [UEController::class, 'destroy'])->name('ues.destroy');
});

Route::resource('ues', UEController::class);
Route::resource('ecs', ECController::class);
require __DIR__.'/auth.php';
