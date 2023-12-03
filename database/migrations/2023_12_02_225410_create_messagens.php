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
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->text('conteudo');
            $table->foreignId('remetente_id')->constrained('usuarios');
            $table->foreignId('destinatario_id')->constrained('usuarios');
            $table->foreignId('mensagem_original_id')->nullable()->constrained('mensagens');
            $table->tinyInteger('lida')->default(0); // Usando tinyint para representar booleano
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
};
