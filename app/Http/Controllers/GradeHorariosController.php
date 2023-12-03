<?php

namespace App\Http\Controllers;

use App\Models\DiasSemanas;
use App\Models\Disciplinas;
use App\Models\GradeHorarios;
use App\Models\Horarios;
use App\Models\Periodos;
use App\Models\Professores;
use App\Models\Salas;
use App\Models\SemanaDiasHorario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class gradeHorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {   
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
        ->get();

        //$gradeHorarios = GradeHorarios::all();

        return view('gradeHorarios.index', compact('gradeHorarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $disciplinas = Disciplinas::select('id', 'nome')->get();
        $horarios = Horarios::all();
        $salas = Salas::select('id', 'numero_sala')->get();
        $periodos = Periodos::select('id', 'status', 'ano_letivo')
            ->where('status', 1)
            ->get();

        $professores = Professores::select('professores.id', 'professores.nome')
            ->join('usuarios', 'professores.idUsuario', '=', 'usuarios.id')
            ->where('usuarios.status', 1)
            ->where('usuarios.tipousuario', 2)
            ->get();

        return view('gradeHorarios.create', compact('disciplinas', 'horarios', 'periodos', 'professores', 'salas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     
        //dd($request);
        $request->validate([
            'professor_id' => 'required',
            'disciplina_id' => 'required',
            'sala_id' => 'required',
            'periodo_id' => 'required'

        ]);
        try {

            DB::beginTransaction();
            
            //Dias da Semana Cronograma
            $stringDias = $request->input('dias_semana');
            $diasSemana = ['domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado'];
            $diasAutomatizados = array_fill_keys($diasSemana, 'N');
        
            foreach ($diasSemana as $dia) {
                // Verifica se o dia está presente na string
                if (strpos($stringDias, $dia) !== false) {
                    $diasAutomatizados[$dia] = 'S';
                }
            }

            $id_dia_semana = DB::table('dias_semana')->insertGetId($diasAutomatizados);

            $horarios= $request->input('horarios');

            foreach ($horarios as $idhorario) {
               SemanaDiasHorario::create([
                    "id_dia_semana" =>  $id_dia_semana,
                    "id_horario" => $idhorario
                ]);
            }
            
           GradeHorarios::create([
                "id_professor" => $request->input('professor_id'),
                "id_disciplina" => $request->input('disciplina_id'),
                "id_sala" => $request->input('sala_id'),
                "id_periodo" => $request->input('periodo_id'),
                "id_dia_semana" =>  $id_dia_semana, // chave unica para usar como comparação
            ]);
            // Associa o ID do usuário criado ao criar um professor
            DB::commit();

            // Retorna uma resposta JSON com a senha gerada
            return redirect()->route('gradeHorarios.index')->with('successo', 'gradeHorarios criado.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Retorna uma resposta JSON com a mensagem de erro
            return response()->json(['success' => false, 'message' => 'Erro ao cadastrar gradeHorarios: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$grade = GradeHorarios::find($id);

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
            ->get();

        return view('gradeHorarios.index', compact('grade', 'gradeHorarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
