@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Calificación</h2>
    <form action="{{ route('calificaciones.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="estudiante_id" class="form-label">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" class="form-select" required>
                @foreach($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="materia" class="form-label">Materia</label>
            <input type="text" name="materia" id="materia" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota (0 - 10)</label>
            <input type="number" step="0.1" min="0" max="10" name="nota" id="nota" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection