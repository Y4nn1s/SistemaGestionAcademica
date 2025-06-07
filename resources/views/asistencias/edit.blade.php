@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Asistencia</h2>
    <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="estudiante_id" class="form-label">Estudiante</label>
            <select name="estudiante_id" id="estudiante_id" class="form-select" required>
                @foreach($estudiantes as $estudiante)
                <option value="{{ $estudiante->id }}" {{ $asistencia->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                    {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $asistencia->fecha) }}" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="presente" id="presente" class="form-check-input" value="1" {{ $asistencia->presente ? 'checked' : '' }}>
            <label for="presente" class="form-check-label">¿Presente?</label>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection