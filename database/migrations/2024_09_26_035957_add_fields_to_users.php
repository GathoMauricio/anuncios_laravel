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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('rol_id')->default(1);
            $table->bigInteger('estatus_id')->default(1);
            $table->string("apaterno")->nullable();
            $table->string("amaterno")->nullable();
            $table->string("telefono")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rol_id');
            $table->dropColumn('estatus_id');
            $table->dropColumn('apaterno');
            $table->dropColumn('amaterno');
            $table->dropColumn('telefono');
        });
    }
};
