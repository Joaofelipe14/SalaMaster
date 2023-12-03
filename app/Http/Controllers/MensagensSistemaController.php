<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Mensagem;
use App\Models\Professores;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class MensagensSistemaController extends Controller
{
    public function criarMensagemFormDocente()
    {
        // Obtém todos os administradores para exibir no formulário
        $Usuarios = Usuarios::where('tipousuario', 1)->get();



        return view('docentes.criarMensagem', compact('Usuarios'));
    }

    public function criarMensagemFormAdm()
    {
        // Obtém todos os administradores para exibir no formulário
        $Usuarios = DB::table('usuarios')
            ->select('usuarios.*', 'p.nome')
            ->join('professores as p', 'usuarios.id', '=', 'p.idUsuario')
            ->get();


        return view('mensagem.create', compact('Usuarios'));
    }

    public function listarMensagemDocenteRecebidas()
    {

        $idProfessor = session('professorId'); // Obtém o valor de 'professorId' da sessão

        $professor = Professores::where('id', $idProfessor)->first();
        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
            ->select('mensagens.*', 'a.nome')
            ->join('administradores as a', 'mensagens.remetente_id', '=', 'a.idUsuario')
            ->where('destinatario_id', '=',  $professor->idUsuario)
            ->orderBy('mensagens.id', 'desc')

            ->get();


        return view('docentes.listarMensagensRecebidas', compact('mensagens'));
    }

    public function listarMensagemDocenteEnviadas()
    {

        $idProfessor = session('professorId'); // Obtém o valor de 'professorId' da sessão

        $professor = Professores::where('id', $idProfessor)->first();

        // print_r($professor);die;        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
            ->select('mensagens.*', 'a.nome')
            ->leftjoin('administradores as a', 'mensagens.remetente_id', '=', 'a.idUsuario')
            ->where('remetente_id', '=',  $professor->idUsuario)
            ->orderBy('mensagens.id', 'desc')
            ->get();

            // var_dump($mensagens);die;

        return view('docentes.listarMensagensEnviadas', compact('mensagens'));
    }


    public function listarMensagemAdmRecebidas()
    {
        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
            ->select('mensagens.*', 'p.nome')
            ->join('professores as p', 'mensagens.remetente_id', '=', 'p.idUsuario')
            ->where('mensagens.destinatario_id', '=', 1)
            ->orderBy('mensagens.id', 'desc')

            ->get();

        return view('mensagem.indexRecebidas', compact('mensagens'));
    }

  
    public function listarMensagemAdmEnviadas()
    {
        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
            ->select('mensagens.*', 'p.nome')
            ->leftjoin('professores as p', 'mensagens.destinatario_id', '=', 'p.idUsuario')
            ->where('mensagens.remetente_id', '=', 1)
            ->orderBy('mensagens.created_at', 'desc')

            ->get();

        return view('mensagem.indexEnviadas', compact('mensagens'));
    }




    public function responderAdmin($id)
    {
        // Valide os dados do formulário conforme necessário
        $iddescriptrgfradio = Crypt::decrypt($id);

        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
            ->select('mensagens.*', 'p.nome', 'p.nome')
            ->join('professores as p', 'mensagens.remetente_id', '=', 'p.idUsuario')
            ->where('mensagens.id', '=', $iddescriptrgfradio)
            ->get();




        /**
         * tem como objetivo construir uma cadeia de IDs de mensagens relacionadas a partir de uma mensagem inicial. 
         * Essa cadeia representa a sequência de mensagens, começando pela mensagem original e indo em direção às mensagens derivadas.
         **/

        $cadeia = [];
        $mensagem = $mensagens[0];
        $mensagemId =  $mensagem->mensagem_original_id;

        // Loop para obter as mensagens derivadas
        while ($mensagemId != 0) {
            // Faça uma consulta para obter a próxima mensagem na cadeia
            $mensagem = DB::table('mensagens')
                ->select('mensagens.*', 'p.nome', 'p.nome')
                ->leftjoin('professores as p', 'mensagens.remetente_id', '=', 'p.idUsuario')
                ->where('mensagens.id', $mensagemId)->first();



            // Se a mensagem for encontrada, adiciona à cadeia e atualiza $mensagemId
            if ($mensagem) {
                $mensagemId = $mensagem->mensagem_original_id;
                $cadeiaDeMensagens[] =  $mensagem;
            } else {
                // Se não encontrar a mensagem, saia do loop (para evitar loops infinitos)
                break;
            }
        }

        // echo '<pre>';
        // print_r($cadeiaDeMensagens);
        // die;

        $cadeiaDeMensagens;

        if (!empty($cadeiaDeMensagens)) {
            return view('mensagem.responder', compact('mensagem', 'cadeiaDeMensagens'));
        } else {
            return view('mensagem.responder', compact('mensagem'));
        }
    }

    public function responderDocente($id)
    {
        $iddescriptrgfradio = Crypt::decrypt($id);

        // Valide os dados do formulário conforme necessário

        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
            ->select('mensagens.*', 'p.nome', 'p.nome')
            ->join('administradores as p', 'mensagens.remetente_id', '=', 'p.idUsuario')
            ->where('mensagens.id', '=', $iddescriptrgfradio)
            ->get();

        $mensagem = $mensagens[0];

        return view('docentes.responder', compact('mensagem'));
    }
    public function enviarMensagemDocente(Request $request)
    {
        // Valide os dados do formulário conforme necessário
        $idProfessor = session('professorId'); // Obtém o valor de 'professorId' da sessão

        $professor = Professores::where('id', $idProfessor)->first();
        // dd($request->all());
        try {
            DB::beginTransaction();
            $mensagem = [
                'conteudo' => $request->input('conteudo'),
                'remetente_id' => $professor->idUsuario,
                'destinatario_id' => $request->input('destinatario_id'),
                'mensagem_original_id' => $request->input('mensagem_original_id'),
                'created_at' => now()
            ];

            DB::table('mensagens')->insert($mensagem);
            // Atualizar o campo 'lida' para 1 na mensagem original
            if (!empty($request->input('mensagem_original_id'))) {
                DB::table('mensagens')->where('id', $request->input('mensagem_original_id'))->update(['lida' => 1]);
            }
            DB::commit();

            return redirect()->to('listar-mensagem-enviadas')->with('successo', 'Mensagem enviada com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->to('listar-mensagem-enviadas')->with('successo', 'Erro enviada com sucesso.');
        }



        // $mensagem->save();
    }
    public function enviarMensagemAdmin(Request $request)
    {


        try {
            DB::beginTransaction();

            $mensagem = [
                'conteudo' => $request->input('conteudo'),
                'remetente_id' => $request->input('idUsuario'),
                'destinatario_id' => $request->input('destinatario_id'),
                'mensagem_original_id' => $request->input('mensagem_original_id'),
                'created_at' => now()
            ];

            // Inserir uma nova mensagem
            DB::table('mensagens')->insert($mensagem);

            // Atualizar o campo 'lida' para 1 na mensagem original
            if (!empty($request->input('mensagem_original_id'))) {
                DB::table('mensagens')->where('id', $request->input('mensagem_original_id'))->update(['lida' => 1]);
            }

            DB::commit();

            return redirect()->to('adm/listar-mensagem-enviadas')->with('successo', 'Mensagem enviada com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Lida com qualquer exceção que ocorra durante a transação
            return redirect()->to('adm/listar-mensagem-enviadas')->with('erro', 'Erro ao enviar mensagem. .' . $e . '.');
        }
    }
}
