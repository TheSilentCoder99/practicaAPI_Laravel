<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas públicas de autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas públicas de academias (lectura)
 Route::apiResource('academy', AcademyController::class)->only(['index','show']);

// Rutas protegidas con Sanctum (requieren token Bearer)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    // CRUD protegido de academias
    Route::apiResource('academy', AcademyController::class);

    // scopeBindings() garantiza que {course} pertenezca realmente a {academy}
    Route::scopeBindings()->group(function () {
    Route::apiResource('academies.courses', CourseController::class);
    });

});