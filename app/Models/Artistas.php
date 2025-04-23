<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{


    protected $table = 'artistas';
    protected $fillable = [
        'idevento',
        'nidentidad',
        'nombre',
        'email',
        'telefono',
        'imagen',
        'descripcion',
        'fecharegistro',
        'estado',
    ];
    // Relación con la tabla eventos (un artista pertenece a un evento)
    
    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class, 'artista_evento', 'artista_id', 'evento_id');
    }
}
