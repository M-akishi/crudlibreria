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
        Schema::create('movimientoprods', function (Blueprint $table) {
            $table->id();
            $table->integer('num_mov');
            $table->unsignedBigInteger('bod_origen');
            $table->unsignedBigInteger('bod_destino');
            $table->unsignedBigInteger('cod_libro');
            $table->integer('cantidad');
            $table->timestamps();

            //foreign
            $table->foreign('bod_origen')->references('id')->on('bodegas');
            $table->foreign('bod_destino')->references('id')->on('bodegas');
            $table->foreign('cod_libro')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientoprods');
    }
};
