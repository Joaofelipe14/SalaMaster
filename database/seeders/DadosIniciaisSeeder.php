<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DadosIniciaisSeeder extends Seeder
{
    public function run()
    {
        // Inserir Dados na Tabela administradores
        DB::table('administradores')->insert([
            'nome' => 'Administrador 1',
            'email' => 'admin1@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('administradores')->insert([
            'nome' => 'Administrador 2',
            'email' => 'admin2@example.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Inserir Dados na Tabela professores
        DB::table('professores')->insert([
            'nome' => 'Professor 1',
            'endereco' => 'Endereço 1',
            'email' => 'professor1@example.com',
            'contato' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('professores')->insert([
            'nome' => 'Professor 2',
            'endereco' => 'Endereço 2',
            'email' => 'professor2@example.com',
            'contato' => '987654321',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Inserir Dados na Tabela usuarios
        DB::table('usuarios')->insert([
            'idGrupoUser' => 1,
            'senha' => 'senha123',
            'email' => 'usuario1@example.com',
            'data_cadastro' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('usuarios')->insert([
            'idGrupoUser' => 2,
            'senha' => 'senha456',
            'email' => 'usuario2@example.com',
            'data_cadastro' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ... (repita o processo para as outras tabelas)

        // Inserir Dados na Tabela grade_horarios
        DB::table('grade_horarios')->insert([
            'id_horario' => 1,
            'id_dia_semana' => 1,
            'id_sala' => 1,
            'id_disciplina' => 1,
            'id_professor' => 1,
            'id_periodo' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('grade_horarios')->insert([
            'id_horario' => 2,
            'id_dia_semana' => 2,
            'id_sala' => 2,
            'id_disciplina' => 2,
            'id_professor' => 2,
            'id_periodo' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Visualizar os dados inseridos na tabela usuarios
        $usuarios = DB::table('usuarios')->get();
        dump($usuarios);
    }
}
