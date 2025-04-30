<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Contactos extends Model

{

    protected $table = 'contactos';

    protected $fillable = [
        'direccion',
        'telefono1',
        'telefono2',
        'email',
        'horario',
        'horarioextras',
        'embebido',
        'urlfacebook',
        'urlx',
        'urlinstagram'
    ];

}
