<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    // Muestra la lista de estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Muestra el formulario para crear un estudiante
    public function create()
    {
        return view('estudiante.create');
    }

    // Guarda un nuevo estudiante
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'nullable|email|unique:estudiantes',
        ]);

        Estudiante::create($request->all());

        return redirect()   ->route('estudiantes.index')
                            ->with('success', 'Estudiante creado exitosamente.');
    }

    // Muestra detalles de un estudiante
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    // Muestra el formulario para editar
    public function edit(Estudiante $estudiante)
    {
        return view('estudiantes.edit', compact('estudiante'));
    }

    // Actualiza un estudiante
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'nullable|email|unique:estudiantes,email,'.$estudiante->id,
        ]);

        $estudiante->update($request->all());

        return redirect()   ->route('estudiantes.index')
                            ->with('success', 'Estudiante actualizado exitosamente.');
    }

    // Elimina un estudiante
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()   ->route('estudiantes.index')
                            ->with('success', 'Estudiante eliminado exitosamente.');
    }
}
