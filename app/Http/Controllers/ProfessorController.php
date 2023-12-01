<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProfessorController extends Controller
{
    public function index()
    {
        $professores = Professores::all();

        return view('professores.index', compact('professores'));
    }

    public function create()
    {
        return view('professores.create');
    }


    public function store(Request $request)

    {

        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'email' => 'required|email',
            'contato' => 'required',
            'cpf' => 'required'
            // Adicione outras regras de validação conforme necessário
        ]);


        try {
            DB::beginTransaction();
            $usuario = Usuarios::create([
                'senha' => Hash::make($request->input('cpf')),
                'email' => $request->input('email'),
                'status' => '1',
            ]);
            // Associa o ID do usuário criado ao criar um professor
            Professores::create([
                'nome' => $request->input('nome'),
                'endereco' => $request->input('endereco'),
                'contato' => $request->input('contato'),
                'email' => $request->input('email'),
                'cpf' => $request->input('cpf'),
                'idUsuario' => $usuario->id,
                // Adicione outros campos conforme necessário
            ]);
            DB::commit();

            // Retorna uma resposta JSON com a senha gerada
            return redirect()->route('professores.index')->with('successo', 'Usuario criado.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Retorna uma resposta JSON com a mensagem de erro
            return response()->json(['success' => false, 'message' => 'Erro ao cadastrar professor: ' . $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $professor = Professores::find($id);


        return view('professores.show', compact('professor'));
    }

    public function edit($id)
    {

        $professor = Professores::find($id);

        return view('professores.edit', compact('professor'));
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

            $professor->usuario->update([
                'status' => $request->input('status'),
            ]);
            
            return redirect()->route('professores.index')->with('successo', 'Professor atualizado com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Se houver outros erros, redirecione com uma mensagem de erro
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
    public function destroy($id)
    {
        try {
            $professor = Professores::findOrFail($id);
            $professor->delete();
            return redirect()->route('professores.index')->with('successo', 'Professor excluído com sucesso.');
        } catch (\Exception $e) {
            // Se houver erros, redirecione com uma mensagem de erro
            return redirect()->back()->with('error', 'Erro ao excluir professor: ' . $e->getMessage());
        }
    }
}
