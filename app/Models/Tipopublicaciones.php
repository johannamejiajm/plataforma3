<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopublicaciones extends Model
{
    //


    use HasFactory;

    // Relación con Publicacion
    public function publicaciones()
    {
        return $this->hasMany(Publicaciones::class, 'idtipo');
    }
}
