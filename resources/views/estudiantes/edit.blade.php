@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Estudiante</h2>
    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $estudiante->apellido) }}" required>
        </div>
        <div class="mb-3">
            <label for="correo_electrónico" class="form-label">Cédula de Identidad</label>
            <input  type="text"
                    name="cedula_identidad"
                    id="cedula_identidad"
                    class="form-control"
                    value="{{ old('cedula_identidad', $estudiante->cedula_identidad ?? '') }}"
                    required
                    minlength="8"
                    maxlength="8"
                    pattern="\d{8}"
                    title="Debe contener exactamente 8 dígitos numéricos">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection