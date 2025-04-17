<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipodonaciones extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    // Relación con Donaciones
    public function donaciones()
    {
        return $this->hasMany(Donaciones::class, 'idtipo');
    }


}
