<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artistas_Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'artista_publicacion'; 
    protected $fillable = ['artista_id', 'publicacion_id'];
    public $timestamps = true; 
}