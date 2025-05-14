<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table = 'eventos'; // Especifica el nombre de la tabla

    protected $fillable = [
        'evento',
        'fechainicial',
        'fechafinal',
        'estado',
    ];

    // Relación con la tabla artistas (un evento tiene muchos artistas)

}
