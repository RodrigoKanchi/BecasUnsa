<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BecaController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('login');
});


Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
        })->name('dashboard');

    
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    
    
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    
    
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    
    
    Route::get('/becas', [BecaController::class, 'index'])->name('becas.index');
    
    
    Route::get('/facultades', [FacultadController::class, 'index'])->name('facultades.index');
    
    
    Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
    
    
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
  
    
});