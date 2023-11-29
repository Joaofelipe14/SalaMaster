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
        Schema::create('grade_horarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_horario')->constrained('horarios');
            $table->foreignId('id_dia_semana')->constrained('dias_semana');
            $table->foreignId('id_sala')->constrained('salas');
            $table->foreignId('id_disciplina')->constrained('disciplinas');
            $table->foreignId('id_professor')->constrained('professores');
            $table->foreignId('id_periodo')->constrained('periodos');
            // Adicione outros campos conforme necessário
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade_horarios');
    }
};
