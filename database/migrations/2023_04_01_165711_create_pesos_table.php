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
        Schema::create('pesos', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->string('fecha');
            $table->number('peso');
            $table->number('peso_teorico');
            $table->number('nota_pasos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesos');
    }
};
