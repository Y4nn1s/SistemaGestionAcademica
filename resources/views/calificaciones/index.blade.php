@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Calificaciones</h2>
    <a href="{{ route('calificaciones.create') }}" class="btn btn-primary mb-3">Registrar Calificación</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Materia</th>
                <th>Nota</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calificaciones as $calificacion)
            <tr>
                <td>{{ $calificacion->id }}</td>
                <td>{{ $calificacion->estudiante->nombre }} {{ $calificacion->estudiante->apellido }}</td>
                <td>{{ $calificacion->materia }}</td>
                <td>{{ number_format($calificacion->nota, 1) }}</td>
                <td>{{ \Carbon\Carbon::parse($calificacion->fecha_registro)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('calificaciones.edit', $calificacion->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('calificaciones.destroy', $calificacion->id) }}" method="POST" style="display:inline;">
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