<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//instru soy yo juan castro hice este cambio porque agregaron dos veces la importacion de HasFactory y genera conflictos
/* use Illuminate\Database\Eloquent\Factories\HasFactory; */
use Illuminate\Database\Eloquent\Model;

class Tipopublicaciones extends Model
{

    use HasFactory;


    protected $table = 'tipopublicaciones';

    protected $fillable = [
        'tipo'
    ];

    // Relación con publicaciones
    public function publicaciones()
    {
        return $this->hasMany(Publicaciones::class, 'idtipo', 'id');
    }
}

