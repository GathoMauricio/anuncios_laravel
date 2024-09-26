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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('estatus_id');
            $table->bigInteger('categoria_id');
            $table->bigInteger('subcategoria_id');
            $table->bigInteger('estado_id');
            $table->bigInteger('municipio_id');
            $table->bigInteger('colonia_id');
            $table->string('cp');
            $table->string('calle_numero');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('precio');
            $table->boolean('negociable');
            $table->string('metodo_pago')->nullable();
            $table->string('referencia_pago')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
