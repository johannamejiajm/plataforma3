<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new  class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_publicacion', function (Blueprint $table) {
            $table->id(); 

            $table->unsignedBigInteger('idartista');
            $table->foreign('idartista')->references('id')->on('artistas')->onDelete('cascade'); // Clave foránea a la tabla 'artistas'

            $table->unsignedBigInteger('idpublicacion');
            $table->foreign('idpublicacion')->references('id')->on('publicaciones')->onDelete('cascade'); // Clave foránea a la tabla 'publicaciones'

            $table->timestamps(); 

            $table->unique(['idartista', 'idpublicacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_publicacion');
    }
};