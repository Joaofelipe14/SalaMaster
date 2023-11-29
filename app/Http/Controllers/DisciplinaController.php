<?php

namespace App\Http\Controllers;

use App\Models\Disciplinas;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplinas = Disciplinas::all();

        return view('disciplina.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disciplina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'nome' => 'required',
            'carga_horaria' => 'required'

        ]);

       

        try {
            $disciplinas = Disciplinas::create([
                'nome' => $request->nome,
                'carga_horaria' => $request->carga_horaria
            ]);
            return response()->json(['success' => true, 'message' => 'Disciplinas cadastrado com sucesso!', 'nome' => $disciplinas]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao cadastrar Disciplina: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $disciplinas = Disciplinas::findOrFail($id);
            return view('disciplina.show', compact('disciplinas'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao buscar disciplina: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $disciplina = Disciplinas::findOrFail($id);
            return view('disciplina.edit', compact('disciplina'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao buscar disciplina para edição: ' . $e->getMessage()]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $disciplinas = Disciplinas::findOrFail($id);
            $disciplinas->update([
                'nome' => $request->nome,
                'carga_horaria' => $request->carga_horaria,
                'updated_at' => now(), // Defina manualmente a data de atualização
            ]);
            return response()->json(['success' => true, 'message' => 'Disciplina atualizado com sucesso!', 'disciplina' => $disciplinas]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao atualizar disciplina: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $disciplinas = Disciplinas::findOrFail($id);
            $disciplinas->delete();
            return response()->json(['success' => true, 'message' => 'Disciplina excluído com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao excluir período: ' . $e->getMessage()]);
        }
    }
}
