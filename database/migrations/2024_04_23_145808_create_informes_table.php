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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipolibros_id')->constrained();
            $table->foreignId('editorial_id')->constrained();
            $table->foreignId('bodegas_id')->constrained();
            $table->foreignId('libros_id')->nullable()->constrained();
            $table->foreignId('revistas_id')->nullable()->constrained();
            $table->foreignId('enciclopedias_id')->nullable()->constrained();
        });
    }
     
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes');
    }
};
