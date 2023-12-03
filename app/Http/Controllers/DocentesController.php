<?php

namespace App\Http\Controllers;

use App\Models\GradeHorarios;
use App\Models\Professores;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class DocentesController extends Controller
{
    //

    public  function indexHome()
    {
        return view('docentes.home');
    }


    public function indexProfessorHorarios()
    
    {   

        $professorId = session('professorId');
        $gradeHorarios = GradeHorarios::select(
        'grade_horarios.id', 
        'professores.nome as nome',
        'disciplinas.nome as disciplina', 
        'periodos.ano_letivo as ano_letivo',
        'salas.numero_sala')
        ->join('professores', 'grade_horarios.id_professor', '=', 'professores.id')
        ->join('disciplinas', 'grade_horarios.id_disciplina', '=', 'disciplinas.id')
        ->join('periodos', 'grade_horarios.id_periodo', '=', 'periodos.id')
        ->join('salas', 'grade_horarios.id_sala', '=', 'salas.id')
        ->where('grade_horarios.id_professor', $professorId)

        ->get();

        //$gradeHorarios = GradeHorarios::all();

        return view('docentes.GradeHorarioDocente', compact('gradeHorarios'));
    }
    public function editById($id)
    {

        $professor = Professores::find($id);


        return view('docentes.edit', compact('professor'));
    }

    public function update(Request $request, $id)
    {
        try {

            $professor = Professores::find($id);

            if (!$professor) {
                throw new \Exception("Professor não encontrado.");
            }

            $professor->update([
                'nome' => $request->input('nome'),
                'endereco' => $request->input('endereco'),
                'email' => $request->input('email'),
                'contato' => $request->input('contato'),
                'cpf' => $request->input('cpf')
            ]);

           

            return redirect('docentes/home')->with('successo', 'Dados Atualizada com sucesso');

        } catch (ValidationValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Se houver outros erros, redirecione com uma mensagem de erro
            return redirect('docentes/home')->with('erro', 'Erro ao atualizada.');
        }
    }

    public function ShowgradeHorariosDocente( $id)
    {
        //$grade = GradeHorarios::find($id);

        $professorId = session('professorId');

        $grade = DB::table('grade_horarios')
        ->select(
            'professores.nome as nome_professor',
            'periodos.ano_letivo',
            'salas.numero_sala',
            'disciplinas.nome as nome_disciplina',
            'dias_semana.segunda',
            'dias_semana.terca',
            'dias_semana.quarta',
            'dias_semana.quinta',
            'dias_semana.sexta',
            'dias_semana.sabado',
            'dias_semana.domingo',
            DB::raw('GROUP_CONCAT(horarios.nome_horario SEPARATOR \', \') as horarios')
        )
        ->join('professores', 'grade_horarios.id_professor', '=', 'professores.id')
        ->join('periodos', 'grade_horarios.id_periodo', '=', 'periodos.id')
        ->join('salas', 'grade_horarios.id_sala', '=', 'salas.id')
        ->join('disciplinas', 'grade_horarios.id_disciplina', '=', 'disciplinas.id')
        ->join('dias_semana', 'grade_horarios.id_dia_semana', '=', 'dias_semana.id')
        ->join('semana_dias_horarios', 'dias_semana.id', '=', 'semana_dias_horarios.id_dia_semana')
        ->join('horarios', 'semana_dias_horarios.id_horario', '=', 'horarios.id')
        ->where('grade_horarios.id', $id)
        ->groupBy(
            'professores.nome',
            'periodos.ano_letivo',
            'salas.numero_sala',
            'disciplinas.nome',
            'dias_semana.segunda',
            'dias_semana.terca',
            'dias_semana.quarta',
            'dias_semana.quinta',
            'dias_semana.sexta',
            'dias_semana.sabado',
            'dias_semana.domingo'
        )
        ->first();

        $gradeHorarios = GradeHorarios::select(
            'grade_horarios.id', 
            'professores.nome as nome',
            'disciplinas.nome as disciplina', 
            'periodos.ano_letivo as ano_letivo',
            'salas.numero_sala')
            ->join('professores', 'grade_horarios.id_professor', '=', 'professores.id')
            ->join('disciplinas', 'grade_horarios.id_disciplina', '=', 'disciplinas.id')
            ->join('periodos', 'grade_horarios.id_periodo', '=', 'periodos.id')
            ->join('salas', 'grade_horarios.id_sala', '=', 'salas.id')
            ->where('grade_horarios.id_professor', $professorId)

            ->get();

        return view('docentes.GradeHorarioDocente', compact('grade', 'gradeHorarios'));
    }

}
