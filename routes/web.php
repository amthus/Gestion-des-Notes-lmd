<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ECController;
use App\Http\Controllers\UEController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EtudiantController;

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

    Route::get('/notes', action: [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');

    Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
    Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
    Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
    Route::get('/etudiants/{etudiant}/edit', [EtudiantController::class, 'edit'])->name('etudiants.edit');
    Route::put('/etudiants/{etudiant}', [EtudiantController::class, 'update'])->name('etudiants.update');
    Route::delete('/etudiants/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');
});

//Route::get('/notes/moyenne/{etudiant_id}/{ue_id}', [NoteController::class, 'moyenneParUE'])->name('notes.moyenne');
Route::get('/notes/moyenne/{etudiant_id}', [NoteController::class, 'afficherMoyennes'])->name('notes.moyenne');

require __DIR__ . '/auth.php';
