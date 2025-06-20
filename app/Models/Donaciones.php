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
        'tipodonacion',
        'soporte'
    ];

    use HasFactory;

    // Relación con Tipodonaciones
    public function tipoDonacion()
    {
        return $this->belongsTo(Tipodonaciones::class, 'tipodonacion');
    }
}
