<?php

use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = [
        'conteudo',
        'remetente_id',
        'destinatario_id',
        'mensagem_original_id',
        'lida',
    ];

    public function remetente()
    {
        return $this->belongsTo(Usuarios::class, 'remetente_id');
    }

    public function destinatario()
    {
        return $this->belongsTo(Usuario::class, 'destinatario_id');
    }

    public function mensagemOriginal()
    {
        return $this->belongsTo(Mensagem::class, 'mensagem_original_id');
    }
}
