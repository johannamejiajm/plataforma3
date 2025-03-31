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
        Schema::create('publicacionfotos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idpublicaciones')->unsigned();
            $table->string('imagen');
            $table->timestamps();
            $table->foreign('idpublicaciones')->references('id')->on('publicaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacionfotos');
    }
};
