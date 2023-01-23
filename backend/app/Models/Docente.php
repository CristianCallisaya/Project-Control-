<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $table = 'docentes';
    protected $fillable = [
        'id',
        'docNombre',
        'docPaterno',
        'docMaterno',
        'celular',
        'docGrado',
        'docEstado'        
    ]; 

    public function relacionSolicitud(){
        return $this->hasMany(Solicitud::class,'id_docente');
    }
    public function relacionAsignacion(){
        return $this->hasMany(AsignacionTribunal::class,'id_tribunal');
    }
    public function relacionCarrera(){
        return $this->belongsTo(Carrera::class,'id_carrera');
    }
    public function relacionDetalle(){
        return $this->hasMany(ProgramacionDetalle::class,'id_tribunal');
    }
    public function relacionDetalleFinal(){
        return $this->hasMany(ProgramacionDetalleFinal::class, 'id_tribunal');
    }
}
