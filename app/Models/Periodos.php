<?php

// app/Models/Periodo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'ano_letivo', 'data_inicio', 'data_fim'];
}
