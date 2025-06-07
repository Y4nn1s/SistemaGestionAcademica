@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Asistencias</h2>
    <a href="{{ route('asistencias.create') }}" class="btn btn-primary mb-3">Registrar Asistencia</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Fecha</th>
                <th>Asistencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asistencias as $asistencia)
            <tr>
                <td>{{ $asistencia->id }}</td>
                <td>{{ $asistencia->estudiante->nombre }} {{ $asistencia->estudiante->apellido }}</td>
                <td>{{ \Carbon\Carbon::parse($asistencia->fecha)->format('d/m/Y') }}</td>
                <td>{{ $asistencia->presente ? 'Presente' : 'Ausente' }}</td>
                <td>
                    <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline;">
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