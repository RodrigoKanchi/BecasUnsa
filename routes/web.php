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

    //Route::resource('permisos', PermisosController::class);
    Route::get('/permisos', [PermisosController::class, 'index'])->name('permisos.index');
    Route::get('/permisos/create', [PermisosController::class, 'create'])->name('permisos.create');
    Route::post('/permisos/store', [PermisosController::class, 'store'])->name('permisos.store');
    Route::get('/permisos/{id}', [PermisosController::class, 'show'])->name('permisos.show');
    Route::get('/permisos/{id}/edit', [PermisosController::class, 'edit'])->name('permisos.edit');
    Route::put('/permisos/{id}', [PermisosController::class, 'update'])->name('permisos.update');
    Route::delete('/permisos/{id}', [PermisosController::class, 'destroy'])->name('permisos.destroy');


    //Route::resource('usuarios', UsuariosController::class);
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}', [UsuariosController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');


    //Route::resource('becas', BecasController::class);
    Route::get('/becas', [BecasController::class, 'index'])->name('becas.index');
    Route::get('/becas/create', [BecasController::class, 'create'])->name('becas.create');
    Route::post('/becas/store', [BecasController::class, 'store'])->name('becas.store');
    Route::get('/becas/{id}', [BecasController::class, 'show'])->name('becas.show');
    Route::get('/becas/{id}/edit', [BecasController::class, 'edit'])->name('becas.edit');
    Route::put('/becas/{id}', [BecasController::class, 'update'])->name('becas.update');
    Route::delete('/becas/{id}', [BecasController::class, 'destroy'])->name('becas.destroy');

    
    //Route::resource('facultades', FacultadesController::class);
    Route::get('/facultades', [FacultadesController::class, 'index'])->name('facultades.index');
    Route::get('/facultades/create', [FacultadesController::class, 'create'])->name('facultades.create');
    Route::post('/facultades/store', [FacultadesController::class, 'store'])->name('facultades.store');
    Route::get('/facultades/{id}', [FacultadesController::class, 'show'])->name('facultades.show');
    Route::get('/facultades/{id}/edit', [FacultadesController::class, 'edit'])->name('facultades.edit');
    Route::put('/facultades/{id}', [FacultadesController::class, 'update'])->name('facultades.update');
    Route::delete('/facultades/{id}', [FacultadesController::class, 'destroy'])->name('facultades.destroy');
    
    
    //Route::resource('carreras', CarrerasController::class);
    Route::get('/carreras', [CarrerasController::class, 'index'])->name('carreras.index');
    Route::get('/carreras/create', [CarrerasController::class, 'create'])->name('carreras.create');
    Route::post('/carreras/store', [CarrerasController::class, 'store'])->name('carreras.store');
    Route::get('/carreras/{id}', [CarrerasController::class, 'show'])->name('carreras.show');
    Route::get('/carreras/{id}/edit', [CarrerasController::class, 'edit'])->name('carreras.edit');
    Route::put('/carreras/{id}', [CarrerasController::class, 'update'])->name('carreras.update');
    Route::delete('/carreras/{id}', [CarrerasController::class, 'destroy'])->name('carreras.destroy');

    
    //Route::resource('categorias', CategoriasController::class);
    Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
    Route::post('/categorias/store', [CategoriasController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}', [CategoriasController::class, 'show'])->name('categorias.show');
    Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

    
    //Route::resource('roles', RolesController::class);
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}', [RolesController::class, 'show'])->name('roles.show');
    Route::get('/roles/{id}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
    
});

