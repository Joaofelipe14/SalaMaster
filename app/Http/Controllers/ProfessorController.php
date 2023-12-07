<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


        $cpf = $request->input('cpf');
        $cpf = str_replace(['-', '.'], '', $cpf);

        try {
            DB::beginTransaction();
            $usuario = Usuarios::create([
                'senha' => Hash::make($cpf),
                'email' => $request->input('email'),
                'status' => '1',
                'tipousuario' => '2',
            ]);
            // Associa o ID do usuário criado ao criar um professor
            Professores::create([
                'nome' => $request->input('nome'),
                'endereco' => $request->input('endereco'),
                'contato' => $request->input('contato'),
                'email' => $request->input('email'),
                'cpf' =>   $request->input('cpf'),
                'idUsuario' => $usuario->id,
                'primeiroAcesso' => 'N',

                // Adicione outros campos conforme necessário
            ]);
            DB::commit();

            // Retorna uma resposta JSON com a senha gerada
            return redirect()->route('professores.index')->with('successo', 'Usuario criado.');
        } catch (\Exception $e) {
            DB::rollBack();
            

            // Retorna uma resposta JSON com a mensagem de erro
            return redirect()->route('professores.index')->with('erro','Erro ao fazer cadastro, esse usuario já existe!');
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

            // Recupere o usuário associado ao professor
            $usuario = $professor->usuario;

            // Exclua o professor
            $professor->delete();

            $usuario->delete();
            return redirect()->route('professores.index')->with('successo', 'Professor excluído com sucesso.');
        } catch (\Exception $e) {
            // Se houver erros, redirecione com uma mensagem de erro
            return redirect()->route('professores.index')->with('erro', 'Erro ao excluir professor: há vinculos Ativos');
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $professorId = $request->input('idUsuario');
            $senhaAtual = $request->input('senha_atual');
            $novaSenha = $request->input('nova_senha');
            $confirmarSenha = $request->input('confirmar_senha');

            // Faça a lógica de atualização de senha aqui...
            $professor = Professores::find($professorId);

       
            // Se quiser visualizar os dados, pode usar dd() para debug
            if (!Hash::check($request->input('senha_atual'), $professor->usuario->senha)) {
                // throw new \Exception("A senha atual não está correta.")

                $erro = 'A senha atual não está correta.';
                return view('docentes.changepassword', compact('professorId', 'erro'));
            }

            DB::beginTransaction();


            // Atualiza a senha do usuário associado ao professor
            $professor->usuario->update([
                'senha' => Hash::make($request->input('nova_senha')),

            ]);
            $professor->update([
                'primeiroAcesso' => 'S',
            ]);
            DB::commit();

            return redirect('docentes/home')->with('successo', 'Senha Atualizada com sucesso');

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['success' => false, 'message' => 'Erro ao atualizar senha: ' . $e->getMessage()]);
        }
    }
}
