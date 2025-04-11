<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{

    use HasFactory;
    protected $table = "donaciones";

   

    protected $fillable = [
        'idtipo', 'fecha', 'donante', 'contacto', 'donacion', 'soporte', 'estado'
    ];

    // Relación con Tipodonaciones
    public function tipoDonacion()
    {
        return $this->belongsTo(Tipodonaciones::class, 'idtipo');
    }
}
