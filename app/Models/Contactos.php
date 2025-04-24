<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\table;

class Contactos extends Model
{

    protected $table = 'contactos';

    protected $fillable = [

        'ubicacion',
        'telefono',
        'correo electronico',
        'horario de atencion',
        'redes sociales'
      

    ];
    
}
