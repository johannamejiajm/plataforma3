<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donaciones extends Model
{
    protected $table = "donaciones";
    protected $fillable =[
        'titulo','contenido','imagen','fechainicial','fechafinal','estado'
    ];
}
