<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckJWTToken
{
  public function handle($request, Closure $next)
  {
    // Verificar se o token está presente na sessão
    if ($request->session()->has('auth_token')) {
      // Verificar a validade do token
      $token = $request->session()->get('auth_token');

      if (JWTAuth::setToken($token)->check()) {
        return $next($request);
      }
    }

    return redirect('/logar')->with('erro', 'Sessão expirada ou token inválido. Faça login novamente..');
  }
}
