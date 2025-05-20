<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos'; // Especifica el nombre de la tabla

    protected $fillable = [
        'evento',
        'fechainicial',
        'fechafinal',
        'estado',
        'imagen',
    ];

    // Relación con la tabla artistas (un evento tiene muchos artistas)

    public function artistas()
    {
        return $this->hasMany(Artistas::class, 'idevento');
    }

}
