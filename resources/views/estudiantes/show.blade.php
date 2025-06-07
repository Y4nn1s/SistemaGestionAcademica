@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Estudiante</h2>
    <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $estudiante->apellido }}</p>
    <p><strong>Correo:</strong> {{ $estudiante->correo_electrónico ?? 'No registrado' }}</p>

    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection