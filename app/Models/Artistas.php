<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{

   protected $fillable=['nombre'];

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
    // Relación con la tabla eventos (un artista pertenece a un evento)
    public function evento()
    {
        return $this->belongsTo(eventos::class, 'idevento');
    }

}
