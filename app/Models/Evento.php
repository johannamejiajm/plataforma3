<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    protected $table = 'evento'; // Especifica el nombre de la tabla

    protected $fillable = [
        'evento',
        'fechainicial',
        'fechafinal',
        'estado',
    ];

    // Relación con la tabla artistas (un evento tiene muchos artistas)

    public function artistas()
    {
        return $this->hasMany(Artistas::class, 'idevento');
    }

}
