<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{


    protected $table = 'artistas';
    
    // Especifica el nombre de la tabla

    protected $fillable =[
        'idevento','identidad','nombre','email','telefono','imagen', 'descripcion', 'fecharegistro', 'estado',
    ];

    // Relación con la tabla eventos (un artista pertenece a un evento)
    public function evento()
    {
        return $this->belongsTo(eventos::class, 'idevento');
    }
}