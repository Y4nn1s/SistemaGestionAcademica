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
            <label for="correo_electrónico" class="form-label">Correo Electrónico (opcional)</label>
            <input type="email" name="correo_electrónico" id="correo_electrónico" class="form-control" value="{{ old('correo_electrónico', $estudiante->correo_electrónico) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection