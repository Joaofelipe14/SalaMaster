<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Horarios;
use App\Models\Professores;
use App\Models\DiasSemanas;
use App\Models\Periodos;
use App\Models\Salas;
use App\Models\Disciplinas;

class GradeHorarios extends Model
{
    protected $table = 'grade_horarios';

    protected $fillable = [
        'id_horario',
        'id_dia_semana',
        'id_sala',
        'id_disciplina',
        'id_professor',
        'id_periodo',
    ];

    // Defina as relações como chaves estrangeiras
    public function horario()
    {
        return $this->belongsTo(Horarios::class, 'id_horario');
    }

    public function diaSemana()
    {
        return $this->belongsTo(DiasSemanas::class, 'id_dia_semana');
    }

    public function sala()
    {
        return $this->belongsTo(Salas::class, 'id_sala');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplinas::class, 'id_disciplina');
    }

    public function professor()
    {
        return $this->belongsTo(Professores::class, 'id_professor');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodos::class, 'id_periodo');
    }
}