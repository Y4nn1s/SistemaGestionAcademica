@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Estudiante</h2>
    <p><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $estudiante->apellido }}</p>
    <p><strong>Cedula de Identidad:</strong> {{ $estudiante->cedula_identidad }}</p>

    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection