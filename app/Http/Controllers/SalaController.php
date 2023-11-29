<?php

namespace App\Http\Controllers;

use App\Models\Salas;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salas =Salas::all();

        return view('sala.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        try {
            $sala =Salas::create([
                'numero_sala' => $request->numero_sala,
                'numero_sala' => $request->numero_sala
            ]);
            return response()->json(['success' => true, 'message' => 'Disciplinas cadastrado com sucesso!', 'nome' => $sala]);
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
            $sala =Salas::findOrFail($id);
            return view('sala.show', compact('sala'));
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
            $sala =Salas::findOrFail($id);
            return view('sala.edit', compact('sala'));
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
            $salas =Salas::findOrFail($id);
            $salas->update([
                'nome' => $request->nome,
                'carga_horaria' => $request->carga_horaria,
                'updated_at' => now(), // Defina manualmente a data de atualização
            ]);
            return response()->json(['success' => true, 'message' => 'Disciplina atualizado com sucesso!', 'disciplina' => $salas]);
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
            $sala =Salas::findOrFail($id);
            $sala->delete();
            return response()->json(['success' => true, 'message' => 'Disciplina excluído com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao excluir período: ' . $e->getMessage()]);
        }
    }
}
