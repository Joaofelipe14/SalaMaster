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
        Schema::create('semana_dias_horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_horario')->constrained('horarios');
            $table->foreignId('id_dia_semana')->constrained('dias_semana');
            // Adicione outros campos conforme necessário
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
