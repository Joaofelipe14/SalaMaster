<?php

namespace App\Http\Controllers;

use App\Models\Professores;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class DocentesController extends Controller
{
    //

    public  function indexHome()
    {
        return view('docentes.home');
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
}
