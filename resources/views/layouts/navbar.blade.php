<link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/components.css') }}">

<!-- Custom style CSS -->

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn"><i data-feather="maximize"></i></a></li>
            <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        @if(session('tipousuario') === 'admin')

        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
                <i data-feather="mail"></i>
                <span class="badge headerBadge1">{{ count($mensagensNavBadAdmin) }}</span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Mensagem
                 
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    @foreach ($mensagensNavBadAdmin as $mensagem)
                    <div class="dropdown-item">
                        <a href="{{ url('responder/' .  Crypt::encrypt($mensagem->id))  }}">
                            <p>Remetente: {{ $mensagem->nome }}</p>
                            <p>Conteúdo: {{ $mensagem->conteudo }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ url('adm/listar-mensagem-recebidas')  }}">Ver Todas <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        @else

        @php
        $idProfessor = session('professorId');
        $professor = \App\Models\Professores::where('id', $idProfessor)->first();

        // Obtém todos os administradores para exibir no formulário
        $mensagensNavBadProfessores = \DB::table('mensagens')
        ->select('mensagens.*', 'a.nome')
        ->join('administradores as a', 'mensagens.remetente_id', '=', 'a.idUsuario')
        ->where('destinatario_id', '=', $professor->idUsuario)
        ->where('mensagens.lida', '=', 0)
        ->orderBy('mensagens.id', 'desc')
        ->get();
        @endphp
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
                <i data-feather="mail"></i>
                <span class="badge headerBadge1">{{ count($mensagensNavBadProfessores) }}</span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown "  style="width:500px">
                <div class="dropdown-header">
                    Mensagem
    
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    @foreach ($mensagensNavBadProfessores as $mensagem)
                    <div class="dropdown-item">
                        <a href="{{ url('responder/' .  Crypt::encrypt($mensagem->id))  }}">
                            <p>Remetente: {{ $mensagem->nome }}</p>
                            <p>Conteúdo: {{ $mensagem->conteudo }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="dropdown-footer text-center">
                    <a href="{{ url('adm/listar-mensagem-recebidas')  }}">Ver Todas <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        @endif
        <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
                <i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Notificações
                 
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <!-- Seu cÃ³digo de notificaÃ§Ãµes aqui -->
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">Ver todas <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/user.png') }}" class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                    @php
                    $Professornome = session('Professornome'); // Obtém o valor de 'professorId' da sessão
                    @endphp
                <div class="dropdown-title">Oi, {{  $Professornome}}</div>
             
                <div class="dropdown-divider"></div>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </li>
    </ul>
</nav>