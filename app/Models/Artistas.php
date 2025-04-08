<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{


    protected $table = 'artistas'; // Especifica el nombre de la tabla

    protected $fillable =[
        'titulo','contenido','imagen','fechainicial','fechafinal','estado'
    ];

    // Relación con la tabla eventos (un artista pertenece a un evento)
    public function evento()
    {
        return $this->belongsTo(eventos::class, 'idevento');
    }
}