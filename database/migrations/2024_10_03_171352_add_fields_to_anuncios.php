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
        Schema::table('anuncios', function (Blueprint $table) {
            $table->integer('recamaras')->default(0);
            $table->integer('banos')->default(0);
            $table->integer('estacionamiento')->default(0);
            $table->integer('antiguedad')->default(0);
            $table->integer('niveles')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anuncios', function (Blueprint $table) {
            $table->dropColumn('recamaras');
            $table->dropColumn('banos');
            $table->dropColumn('estacionamiento');
            $table->dropColumn('antiguedad');
            $table->dropColumn('niveles');
        });
    }
};
