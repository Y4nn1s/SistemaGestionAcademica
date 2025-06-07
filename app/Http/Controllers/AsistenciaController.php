<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class AsistenciaController extends Controller
{
    // Muestra todas las asistencias
    public function index()
    {
        $asistencias = Asistencia::with('estudiante')->get();
        return view('asistencias.index', compact('asistencias'));
    }

    // Muestra formulario para crear una asistencia
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('asistencias.create', compact('estudiantes'));
    }

    // Guarda nueva asistencia
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'fecha' => 'required|date',
            'presente' => 'required|boolean',
        ]);

        Asistencia::create($request->all());

        return redirect()   ->route('asistencias.index')
                            ->with('success', 'Asistencia registrada exitosamente.');
    }

    // Muestra detalles de una asistencia
    public function show(Asistencia $asistencia)
    {
        $asistencia->load('estudiante');
        return view('asistencias.show', compact('asistencia'));
    }

    // Muestra formulario para editar
    public function edit(Asistencia $asistencia)
    {
        $estudiantes = Estudiante::all();
        return view('asistencias.edit', compact('asistencia', 'estudiantes'));
    }

    // Actualiza la asistencia
    public function update(Request $request, Asistencia $asistencia)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'fecha' => 'required|date',
            'presente' => 'required|boolean',
        ]);

        $asistencia->update($request->all());

        return redirect()   ->route('asistencias.index')
                            ->with('success', 'Asistencia actualizada exitosamente.');
    }

    // Elimina una asistencia
    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();

        return redirect()   ->route('asistencias.index')
                            ->with('success', 'Asistencia eliminada exitosamente.');
    }
}