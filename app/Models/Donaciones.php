<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{
    protected $table = 'donaciones';
    protected $fillable = [
        'idtipo',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'donacion',
        'soporte'
    ];

    use HasFactory;

    // Relación con Tipodonaciones
    public function tipodonacion()
    {
        return $this->belongsTo(Tipodonaciones::class, 'idtipo', 'id');
    }
}
