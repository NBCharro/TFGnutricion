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
            $table->string('peso');
            $table->string('peso_teorico');
            $table->string('nota_pasos');
            // $table->double('peso');
            // $table->double('peso_teorico');
            // $table->double('nota_pasos');
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
