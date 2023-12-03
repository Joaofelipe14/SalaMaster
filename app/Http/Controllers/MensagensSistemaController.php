<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Mensagem;
use Illuminate\Support\Facades\DB;

class MensagensSistemaController extends Controller
{
    public function criarMensagemFormDocente()
    {
        // Obtém todos os administradores para exibir no formulário
        $Usuarios = Usuarios::where('tipousuario', 1)->get();



        return view('docentes.criarMensagem', compact('Usuarios'));
    }

    public function listarMensagemDocente($id)
    {
        // Obtém todos os administradores para exibir no formulário
        $mensagens = DB::table('mensagens')
        ->where('remetente_id', '=',$id)
        ->get(); 

    return view('docentes.listarMensagens', compact('mensagens'));
    }

    public function enviarMensagemDocente(Request $request)
    {
        // Valide os dados do formulário conforme necessário

        // dd($request->all());
        $mensagem = [
            'conteudo' => $request->input('conteudo'),
            'remetente_id' => $request->input('idUsuario'),
            'destinatario_id' => $request->input('destinatario_id'),
        ];
        
        DB::table('mensagens')->insert($mensagem);

        // $mensagem->save();

        return redirect()->back()->with('success', 'Mensagem enviada com sucesso.');
    }
}
