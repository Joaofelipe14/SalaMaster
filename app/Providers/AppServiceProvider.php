<?php

namespace App\Providers;

use App\Models\Professores;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('mensagensNavBadAdmin', DB::table('mensagens')
        ->select('mensagens.*', 'p.nome')
        ->join('professores as p', 'mensagens.remetente_id', '=', 'p.idUsuario')
        ->where('mensagens.destinatario_id', '=', 1)
        ->where('mensagens.lida', '=', 0)
        ->orderBy('mensagens.id', 'desc')
        ->get());


        
    
          
    }
}
