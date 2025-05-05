<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $table = "publicaciones";
    protected $fillable =[
        'idtipo', 
        'iduser', 
        'titulo',
        'contenido',
        'imagen',
        'fechainicial',
        'fechafinal',
        'estado'
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function tipo() {
        return $this->belongsTo(Tipopublicaciones::class, 'idtipo');
    }

    public function fotos()
    {
        return $this->hasMany(Publicacionfotos::class, 'idpublicaciones');
    }
}
