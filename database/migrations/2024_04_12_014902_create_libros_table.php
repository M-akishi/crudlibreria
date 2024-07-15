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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->unsignedBigInteger('tipo_libro');
            $table->unsignedBigInteger('autor_code');
            $table->text('des_libro');
            $table->unsignedBigInteger('genero_code');
            $table->unsignedBigInteger('editorial_code');
            $table->timestamps();

            //foreign keys
            $table->foreign('tipo_libro')->references('id')->on('tipolibros');
            $table->foreign('autor_code')->references('id')->on('autors');
            $table->foreign('editorial_code')->references('id')->on('editorials');
            $table->foreign('genero_code')->references('id')->on('generos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
