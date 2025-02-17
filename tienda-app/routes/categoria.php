<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::resource('categorias', CategoryController::class)
    ->only(['index', 'store', 'update', 'delete'])
    ->middleware(['auth', 'verified', 'admin']);
