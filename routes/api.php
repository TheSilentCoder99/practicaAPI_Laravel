<?php

use App\Http\Controllers\AcademyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Al crear las rutas, distingue qué endpoints son públicos y cuáles privados (los que van dentro del grupo de sanctum)
// auth:sanctum hace una sola pregunta: ¿quién eres? Si el cliente no puede responderla, auth:sanctum corta la petición y el controlador ni se ejecuta.



Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/store',[AcademyController::class,'store']);
    
    Route::patch('/update/{academy}',[AcademyController::class,'update']);

    Route::delete('/destroy/{academy}',[AcademyController::class,'destroy']);

});

// Estas no van dentro del middleware porque no necesitas comprobar si el usuario tiene algún token para poder iniciar sesión o registrarte o ver todas las academias o una en concreto

Route::post('/login', [AuthController::class, 'login']);

Route::get('/index', [AcademyController::class, 'index']);

Route::get('/show/{academy}',[AcademyController::class,'show']);

Route::post('/register', [AuthController::class, 'register']);





