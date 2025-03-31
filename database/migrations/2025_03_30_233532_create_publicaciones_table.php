<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idtipo')->unsigned();
            $table->bigInteger('iduser')->unsigned();
            $table->string('titulo');
            $table->string('contenido',5000);
            $table->dateTime('fechainicial');
            $table->dateTime('fechafinal');
            $table->enum('estado',[1,0]);
            $table->timestamps();
            $table->foreign('idtipo')->references('id')->on('tipopublicaciones');
            $table->foreign('iduser')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
