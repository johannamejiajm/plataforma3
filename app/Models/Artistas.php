<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{


    protected $table = 'artistas';
    protected $fillable = [
        'idevento',
        'identidad',
        'nombre',
        'email',
        'telefono',
        'imagen',
        'descripcion',
        'fecharegistro',
        'estado',
    ];
    // Relación con la tabla eventos (un artista pertenece a un evento)
    public function evento()
    {
        return $this->belongsTo(evento::class, 'idevento');
    }
}
