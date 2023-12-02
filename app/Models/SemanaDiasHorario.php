<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Horarios;
use App\Models\DiasSemanas;



class SemanaDiasHorario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_horario',
        'id_dia_semana',
      
    ];

    public function horario()
    {
        return $this->belongsTo(Horarios::class, 'id_horario');
    }

    public function diaSemana()
    {
        return $this->belongsTo(DiasSemanas::class, 'id_dia_semana');
    }


}
