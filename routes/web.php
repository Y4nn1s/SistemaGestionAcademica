<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CalificacionController;


// Redirección inicial
Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

// Rutas para Estudiantes
Route::resource('estudiantes', EstudianteController::class);

// Rutas para Asistencias
Route::resource('asistencias', AsistenciaController::class);

// Rutas para Calificaciones
Route::resource('calificaciones', CalificacionController::class);
