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
        Schema::create('errores', function (Blueprint $table) {
            $table->id();
            $table->string('codigoError');
            $table->text('mensajeError');
            $table->string('archivo');
            $table->string('funcion');
            $table->string('linea');
            $table->string('fecha');
            $table->string('paginaWeb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('errores');
    }
};
