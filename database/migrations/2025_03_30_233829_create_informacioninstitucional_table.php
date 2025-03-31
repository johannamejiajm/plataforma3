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
        Schema::create('informacioninstitucional', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idtipo')->unsigned();
            $table->string('contenido',5000);
            $table->string('foto')->nullable();
            $table->dateTime('fechainicial');
            $table->timestamps();
            $table->foreign('idtipo')->references('id')->on('tipoinformacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacioninstitucional');
    }
};
