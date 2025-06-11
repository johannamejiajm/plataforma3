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
        Schema::create('artistas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idevento')->unsigned();
            $table->string('identidad');
            $table->string('nombre');
            $table->string('email');
            $table->string('telefono');
            $table->string('imagen');
            $table->string('descripcion');
            $table->enum('estado',[1,0]);
            $table->timestamps();
            $table->foreign('idevento')->references('id')->on('eventos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artistas');
    }
};
