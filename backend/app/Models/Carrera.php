<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    protected $fillable = ['carreraNombre', 'correlativo'];

    public function relacion_estudiante()
    {
        return $this->hasMany(Estudiante::class, 'id');
    }
}
