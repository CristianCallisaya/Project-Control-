<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'modalidads';

    protected $fillable = [
        'id',
        'nombreModalidad'
    ];

    public function solicitud(){
        return $this->belongsTo(Solicitud::class);
    }
}
