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
        Schema::create('textos_clientes', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->enum(
                'tipo_texto',
                [
                    "general1",
                    "general2",
                    "general3",
                    "especifico"
                ]
            );
            $table->text('texto1');
            $table->text('texto2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textos_clientes');
    }
};
