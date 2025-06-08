<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';

    protected $fillable = ['nombre', 'apellido', 'cedula_identidad'];

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }

    public function getCedulaIdentidadAttribute($value)
    {
        return 'V-' . number_format($value, 0, '', '.');
    }
}
