<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {


        // Lógica de validação e login aqui
        // Use o método Auth::attempt para autenticar o usuário

        // Exemplo:


        $user = Usuarios::where('email', $request->input('email'))->first();

        $credentials = $request->only('email', 'senha');
        if ($user) {
            // Verifique a senha usando Hash::check


            if (Hash::check($request->input('password'), $user->senha)) {
                // Senha válida, autenticação bem-sucedida

                $token = JWTAuth::fromUser($user);
                $request->session()->put('auth_token', $token);

                if ($user->tipousuario == 1) {
                    $request->session()->put('tipousuario', 'admin');
                    return redirect()->intended('/professores');
                } elseif ($user->tipousuario == 2) {
                    $request->session()->put('tipousuario', 'professor');
                    echo '<pre>';

                    if ($user->professor->primeiroAcesso == 'N') {
                        $professorId =  $user->professor->id;
                        return view('docentes.changepassword', compact('professorId'));
                    } else {
                        return view('docentes.home');
                    }
                }
            }
        }

        return redirect()->route('login')->with('erro', 'Senha ou Email incorreto.');
    }
    public function logout(Request $request)
    {
        // Remover o token da sessão (opcional)
        $request->session()->forget('auth_token');
        $request->session()->forget('tipousuario');
        // Redirecionar para a página de login ou outra página desejada
        return redirect()->route('login');
    }
}
