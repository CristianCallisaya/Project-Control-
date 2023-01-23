<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'id_carrera',
        'esNombres',
        'esPaterno',
        'esMaterno',
        'esCelular',
        'esTituloProyecto',
        'esGenero',
        'esEstado',
        'esFinal',
        'habilitacion',
        'esSolicitud',
        'esAsignacion',
        'confirmacionAsignacion'
    ];

    public function relacion_carrera(){
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
    public function relacionAsignacion(){
        return $this->hasMany(AsignacionTribunal::class, 'id_estudiante');
    }
    public function relacionSolicitud(){
        return $this->hasMany(Solicitud::class, 'id_estudiante');
    }
    public function relacionProgramacion(){ 
        return $this->hasMany(Programacion::class, 'id_estudiante');
    }
    public function relacionDetalle(){
        return $this->hasMany(ProgramacionDetalle::class,'id_estudiante');
    }
    public function relacionObservacion(){
        return $this->hasMany(ObservacionEstudiante::class, 'id_estudiante');
    }
}
