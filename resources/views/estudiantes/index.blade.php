@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Estudiantes</h2>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Nuevo Estudiante</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cédula de Identidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->id }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellido }}</td>
                <td>{{ $estudiante->cedula_identidad }}</td>
                <td>
                    <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection