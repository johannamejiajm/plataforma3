<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
