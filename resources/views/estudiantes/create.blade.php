@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Estudiante</h2>
    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cedula_identidad" class="form-label">Cédula de Identidad</label>
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
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection