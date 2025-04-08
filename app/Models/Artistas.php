<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artistas extends Model
{
    

    protected $table = 'artistas';

    protected $fillable = [
        'idevento',
        'nidentidad',
        'nombre',
        'email',
        'telefono',
        'foto',
        'descripcion',
        'fecharegistro',
        'estado',
    ];


   
    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'idevento', 'id');
    }

}
