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
            <label for="correo_electrónico" class="form-label">Correo Electrónico (opcional)</label>
            <input type="email" name="correo_electrónico" id="correo_electrónico" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection