<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionTribunal extends Model
{
    use HasFactory;
    protected $table = 'asignacion_tribunals';
    protected $fillable = [
        'id',
        'id_estudiante',
        'id_tribunal',
        'cartaEnvio',
        'cartaRespuesta',
        'actaRespuesta',
        'solicitarCorrecion',
        'nroActa',
        'nroActaInforme',
        'nroCartaDefensa',
        'nroCartaSolInforme',
        'fechaLimiteActa',
        'fechaLimiteInformeActa',
        'fechaLimiteCorreciones',
        'fechaAsignacion',
        'fechaCartaRespuesta',
        'fechaActaRespuesta',
        'fechaSolicitarCorrecion'
    ];
    public $timestamps = false;

    public function relacionEstudiante(){
        return $this->belongsTo(Estudiante::class,'id_estudiante');
    }
    public function relacionTribunal(){
        return $this->belongsTo(Docente::class,'id_tribunal');
    }
}
