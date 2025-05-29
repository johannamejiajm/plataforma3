<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informacioninstitucional extends Model
{
    //
    protected $table = 'informacioninstitucional';

    protected $fillable = [
        'idtipo', 'contenido', 'foto'
    ];

    public function tipo()
    {
        return $this->belongsTo(Tipoinformacion::class, 'idtipo');
    }
}
