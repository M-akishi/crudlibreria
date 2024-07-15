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
        Schema::create('inventario_b_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bodega');
            $table->unsignedBigInteger('id_libro');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('id_bodega')->references('id')->on('bodegas');
            $table->foreign('id_libro')->references('id')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_b_s');
    }
};
