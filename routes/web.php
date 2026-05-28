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

    
    /*
    Route::resources('/users', [UserController::class, 'index'])->name('users.index');
    
    
    Route::resources('/roles', [RoleController::class, 'index'])->name('roles.index');
    
    
    Route::resources('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    
    
    Route::resources('/becas', [BecaController::class, 'index'])->name('becas.index');
    
    
    Route::resources('/facultades', [FacultadController::class, 'index'])->name('facultades.index');
    
    
    Route::resources('/carreras', [CarreraController::class, 'index'])->name('carreras.index');
    
    
    Route::resources('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    
    */
    

});

