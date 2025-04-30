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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('email');
            $table->string('horario');
            $table->string('horarioextras');
            $table->string('embebido');
            $table->string('urlfacebook');
            $table->string('urlx');
            $table->string('urlinstagram');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
