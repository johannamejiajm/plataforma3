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
        Schema::table('informacioninstitucional', function (Blueprint $table) {
            //
             Schema::table('informacioninstitucional', function (Blueprint $table) {
                $table->boolean('estado')->default(true)->after('fechainicial');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informacioninstitucional', function (Blueprint $table) {
            //
             Schema::table('informacioninstitucional', function (Blueprint $table) {
                $table->dropColumn('estado');
            });
        });
    }
};
