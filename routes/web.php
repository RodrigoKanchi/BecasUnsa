<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\BecaController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
        })->name('dashboard');

    Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos');
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/becas', [BecaController::class, 'index'])->name('becas');
    Route::get('/facultades', [FacultadController::class, 'index'])->name('facultades');
    Route::get('/carreras', [CarreraController::class, 'index'])->name('carreras');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
    Route::get('/roles', [RolesController::class, 'index'])->name('roles');

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

