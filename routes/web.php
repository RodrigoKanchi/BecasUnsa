<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\BecasController;
use App\Http\Controllers\FacultadesController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\CategoriasController;

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('backend.home');
        })->name('dashboard');

    Route::resource('permisos', PermisosController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('becas', BecasController::class);
    Route::resource('facultades', FacultadesController::class);
    Route::resource('carreras', CarrerasController::class);
    Route::resource('categorias', CategoriasController::class);
    Route::resource('roles', RolesController::class);
    

});

