<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Solo administradores
Route::get('/admin/users', [AdminController::class, 'index'])
    ->middleware(['auth', 'role:admin']);

// Administradores y Chefs
Route::get('/recipe/create', [RecipeController::class, 'create'])
    ->middleware(['auth', 'role:admin,chef']);

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


// Al indicar únicamente DashboardController::class, Laravel ejecuta automáticamente su método __invoke().
// ->middleware(['auth']): Protege la ruta para que solo los usuarios que hayan iniciado sesión puedan acceder.
// ->name('dashboard'): Asigna un nombre interno a la ruta. 
// Esto te permite enlazarla en tus vistas Blade escribiendo <a href="{{ route('dashboard') }}"> 
// o redirigir a ella desde otros controladores con redirect()->route('dashboard').

Route::get('/dashboard', DashboardController::class) 
    ->middleware(['auth'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
