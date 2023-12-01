<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertAdmin extends Seeder
{
    public function run()
    {
        // Inserir dados na tabela 'usuarios'
        $usuarioId = DB::table('usuarios')->insertGetId([
            'senha' => Hash::make('admin'),
            'email' => 'admin@admin.com',
            'status' => 1,
            'tipousuario'=>1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Inserir dados na tabela 'administradores'
        DB::table('administradores')->insert([
            'nome' => 'admin',
            'email' => 'admin@gmail.com',
            'idUsuario' => $usuarioId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
