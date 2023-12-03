<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores';

    protected $fillable = ['nome', 'idUsuario', 'email'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }


}
