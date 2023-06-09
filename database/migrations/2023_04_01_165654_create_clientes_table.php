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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->string('nombre_apellidos');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('fecha_inicio');
            $table->double('peso_inicial');
            $table->double('peso_final_1');
            $table->double('peso_final_2')->nullable();
            $table->integer('perdida_peso_1');
            $table->integer('semanas_perdida_peso_1');
            $table->integer('perdida_peso_2')->nullable();
            $table->integer('semanas_perdida_peso_2')->nullable();
            $table->integer('perdida_peso_final');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
