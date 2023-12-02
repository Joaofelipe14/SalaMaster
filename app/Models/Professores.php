<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;


class Professores extends Model
{
    use HasFactory;

    
    protected $fillable = ['nome','endereco', 'email', 'contato','idUsuario','cpf','primeiroAcesso'];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'idUsuario');
    }
}
