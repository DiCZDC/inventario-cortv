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
        Schema::create('consultores', function (Blueprint $table) {
            $table->id('id_consultor')->primary();
            $table->date('fecha_consulta')->default(now());
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id_persona')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultores');
    }
};
