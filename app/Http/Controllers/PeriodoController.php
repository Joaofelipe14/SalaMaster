<?php

namespace App\Http\Controllers;

use App\Models\Periodos;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $periodos = Periodos::all();

            return view('periodo.index', compact('periodos'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao buscar períodos: ' . $e->getMessage()]);
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        try {
            $periodo = Periodos::create($request->all());
            return response()->json(['success' => true, 'message' => 'Período cadastrado com sucesso!', 'periodo' => $periodo]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao cadastrar período: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('periodo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $periodo = Periodos::findOrFail($id);
            return view('periodo.show', compact('periodo'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao buscar período: ' . $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $periodo = Periodos::findOrFail($id);
            return view('periodo.edit', compact('periodo'));
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao buscar período para edição: ' . $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $periodo = Periodos::findOrFail($id);
            $periodo->update($request->all());
            return response()->json(['success' => true, 'message' => 'Período atualizado com sucesso!', 'periodo' => $periodo]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao atualizar período: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $periodo = Periodos::findOrFail($id);
            $periodo->delete();
            return response()->json(['success' => true, 'message' => 'Período excluído com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao excluir período: ' . $e->getMessage()]);
        }
    }
}
