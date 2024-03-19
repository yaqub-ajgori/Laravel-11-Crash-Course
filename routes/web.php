<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','verified'])->prefix('dashboard')->group(function () {
    // Route::get('/notes', [NoteController::class,'index'])->name('notes.index');
    // Route::get('/notes/create', [NoteController::class,'create'])->name('notes.create');
    // Route::post('/notes', [NoteController::class,'store'])->name('notes.store');
    // Route::get('/notes/{note}', [NoteController::class,'show'])->name('notes.show');
    // Route::get('/notes/{note}/edit', [NoteController::class,'edit'])->name('notes.edit');
    // Route::patch('/notes/{note}', [NoteController::class,'update'])->name('notes.update');
    // Route::delete('/notes/{note}', [NoteController::class,'destroy'])->name('notes.destroy');

    Route::resource('/notes', NoteController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
