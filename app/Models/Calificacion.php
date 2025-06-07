<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';

    protected $fillable = ['estudiante_id', 'materia', 'nota', 'fecha_registro'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}

