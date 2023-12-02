<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertPadrao extends Seeder
{
    public function run()
    {
        // Inserir dados na tabela 'usuarios'
        $usuarioId = DB::table('usuarios')->insertGetId([
            'senha' => Hash::make('admin'),
            'email' => 'admin@admin.com',
            'status' => 1,
            'tipousuario' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Inserir dados na tabela 'administradores'
        DB::table('administradores')->insert([
            'nome' => 'admin',
            'email' => 'admin@admin.com',
            'idUsuario' => $usuarioId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $horarios = [
            ['horario_inicio' => '07:30', 'horario_fim' => '08:20', 'nome_horario'=>'1ª M'],
            ['horario_inicio' => '08:20', 'horario_fim' => '09:10', 'nome_horario'=>'2ª M'],
            ['horario_inicio' => '09:20', 'horario_fim' => '10:10', 'nome_horario'=>'3ª M'],
            ['horario_inicio' => '10:10', 'horario_fim' => '11:00', 'nome_horario'=>'4ª M'],
            ['horario_inicio' => '11:10', 'horario_fim' => '12:00', 'nome_horario'=>'5ª M'],
            ['horario_inicio' => '12:00', 'horario_fim' => '12:50', 'nome_horario'=>'6ª M'],
            ['horario_inicio' => '13:10', 'horario_fim' => '14:00', 'nome_horario'=>'1ª T'],
            ['horario_inicio' => '14:00', 'horario_fim' => '14:50', 'nome_horario'=>'2ª T'],
            ['horario_inicio' => '14:50', 'horario_fim' => '15:40', 'nome_horario'=>'3ª T'],
            ['horario_inicio' => '15:50', 'horario_fim' => '16:40', 'nome_horario'=>'4ª T'],
            ['horario_inicio' => '16:40', 'horario_fim' => '17:30', 'nome_horario'=>'5ª T'],
            ['horario_inicio' => '17:40', 'horario_fim' => '18:30', 'nome_horario'=>'6ª T'],
            ['horario_inicio' => '18:30', 'horario_fim' => '19:20', 'nome_horario'=>'2ª N'],
            ['horario_inicio' => '19:30', 'horario_fim' => '20:20', 'nome_horario'=>'2ª N'],
            ['horario_inicio' => '20:20', 'horario_fim' => '21:10', 'nome_horario'=>'3ª N'],
            ['horario_inicio' => '21:10', 'horario_fim' => '22:00', 'nome_horario'=>'4ª N'],
        ];

        foreach ($horarios as $horario) {
            DB::table('horarios')->insert([
                'horario_inicio' => $horario['horario_inicio'],
                'horario_fim' => $horario['horario_fim'],
                'nome_horario' => $horario['nome_horario'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
