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
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->enum(
                'accion',
                [
                    "desayuno",
                    "media mañana",
                    "comida",
                    "merienda",
                    "cena",
                    "recena",
                    "otro"
                ]
            );
            $table->text('platos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
