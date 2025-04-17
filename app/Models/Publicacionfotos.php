<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacionfotos extends Model
{
    //
    protected $table = "publicacionfotos";


    protected $fillable =[
        'idpublicaciones', 'imagen'
     ];



    public function publicacion()
    {
        return $this->belongsTo(Publicaciones::class, 'idpublicaciones');
    }
}
