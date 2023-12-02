<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Horarios;
use App\Models\Professores;
use App\Models\SemanaDiasHorario;
use App\Models\Periodos;
use App\Models\Salas;
use App\Models\Disciplinas;

class GradeHorarios extends Model
{
    protected $table = 'grade_horarios';

    protected $fillable = [
        'id_dia_semana',
        'id_sala',
        'id_disciplina',
        'id_professor',
        'id_periodo',
    ];


   
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
