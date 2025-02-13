<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* Route::resource('/usuarios', UserController::class)
    ->only(['index', 'store'])
    //Necesitamos crear un middleware para saber que solo los administradores puedan acceder a esto
    ->middleware(['auth', 'verified']); */

/* Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::post('/usuario', [UserController::class, 'store'])->name('usuario.agregar'); */

Route::resource('usuarios', UserController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['verified', 'auth', 'admin']);
