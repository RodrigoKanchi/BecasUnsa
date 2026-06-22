<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BecaController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/buscarBeca', [BecaController::class, 'buscar'])->name('becas.buscar');
Route::put('/edit', [AuthController::class,'update']);
Route::post('/favoritos/create', [AuthController::class, 'marcarFavorito']);
Route::delete('/favoritos/delete', [AuthController::class, 'desmarcarFavorito']);
Route::get('/favoritos', [AuthController::class, 'verFavoritos']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/becas', [BecaController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
