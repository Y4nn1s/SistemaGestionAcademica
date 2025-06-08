@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Calificación</h2>
    <form action="{{ route('calificaciones.update', $calificacion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="estudiante_id" class="form-label">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" class="form-select" required>
                @foreach($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" {{ $calificacion->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                    {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="materia" class="form-label">Materia</label>
            <input type="text" name="materia" id="materia" class="form-control" value="{{ old('materia', $calificacion->materia) }}" required>
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota (01 - 20)</label>
            <input type="number" step="0.1" min="01" max="20" name="nota" id="nota" class="form-control" value="{{ old('nota', $calificacion->nota) }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_registro" class="form-label">Fecha de Registro</label>
            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" value="{{ old('fecha_registro', $calificacion->fecha_registro) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('calificaciones.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection