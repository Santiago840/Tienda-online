<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/usuarios', UserController::class)
    ->only(['index'])
    //Necesitamos crear un middleware para saber que solo los administradores puedan acceder a esto
    ->middleware(['auth', 'verified']);
