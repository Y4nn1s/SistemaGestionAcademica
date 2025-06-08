<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\Estudiante;

class CalificacionController extends Controller
{
    // Muestra todas las calificaciones
    public function index()
    {
        $calificaciones = Calificacion::with('estudiante')->get();
        return view('calificaciones.index', compact('calificaciones'));
    }

    // Muestra formulario para crear una calificación
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('calificaciones.create', compact('estudiantes'));
    }

    // Guarda nueva calificación
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'materia' => 'required|string|max:255',
            'nota' => 'required|numeric|min:1|max:20',
            'fecha_registro' => 'required|date',
        ]);

        Calificacion::create($request->all());

        return redirect()   ->route('calificaciones.index')
                            ->with('success', 'Calificación registrada exitosamente.');
    }

    // Muestra detalles de una calificación (opcional)
    public function show(Calificacion $calificacion)
    {
        $calificacion->load('estudiante');
        return view('calificaciones.show', compact('calificacion'));
    }

    // Muestra formulario para editar
    public function edit(Calificacion $calificacion)
    {
        $estudiantes = Estudiante::all();
        return view('calificaciones.edit', compact('calificacion', 'estudiantes'));
    }

    // Actualiza la calificación
    public function update(Request $request, Calificacion $calificacion)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'materia' => 'required|string|max:255',
            'nota' => 'required|numeric|min:1|max:20',
            'fecha_registro' => 'required|date',
        ]);

        $calificacion->update($request->all());

        return redirect()   ->route('calificaciones.index')
                            ->with('success', 'Calificación actualizada exitosamente.');
    }

    // Elimina una calificación
    public function destroy(Calificacion $calificacion)
    {
        $calificacion->delete();

        return redirect()   ->route('calificaciones.index')
                            ->with('success', 'Calificación eliminada exitosamente.');
    }
}
