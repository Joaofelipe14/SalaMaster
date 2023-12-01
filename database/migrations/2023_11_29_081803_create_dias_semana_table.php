<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dias_semana', function (Blueprint $table) {
            $table->id();
            $table->char('domingo', 1)->nullable();
            $table->char('segunda', 1)->nullable();
            $table->char('terca', 1)->nullable();
            $table->char('quarta', 1)->nullable();
            $table->char('quinta', 1)->nullable();
            $table->char('sexta', 1)->nullable();
            $table->char('sabado', 1)->nullable();            // Adicione outros campos conforme necessário
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias_semana');
    }
};
