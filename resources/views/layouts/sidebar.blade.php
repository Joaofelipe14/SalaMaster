<link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/components.css') }}">

<!-- Custom style CSS -->
<!-- <link rel="stylesheet" href="{{ asset('/css/custom.css') }}"> -->
<link rel='shortcut icon' type='image/x-icon' href="{{ asset('img/favicon.ico') }}" />
<!-- JS Libraries -->
<!-- Page Specific JS File -->
<!-- Template JS File -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('restrita') }}">
                <img alt="image" src="{{ asset('img/logo.png') }}" class="header-logo" />
                <span class="logo-name">SalaMaster</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Ambiente Seguro</li>


            <!-- Logica para o Adminstrador -->
            @if(session('tipousuario') === 'admin')

            <li class="dropdown">
                <a href="{{ url('restrita') }}" class="nav-link"><i data-feather="home"></i><span>Home</span></a>
            </li>

            <li class="dropdown ">
                <a href="{{ url('professores') }}" class="nav-link"><i data-feather="users"></i><span>Professores</span></a>
            </li>

            <li class="dropdown ">
                <a href="{{ url('gradeHorarios') }}" class="nav-link"><i data-feather="clock"></i><span>Grades Horários</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Salas e Periodos</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('salas') }}">Salas</a></li>
                    <li><a class="nav-link" href="{{ url('periodos') }}">Períodos Letivos</a></li>
                </ul>
            </li>

            <li class="dropdown ">
                <a href="{{ url('disciplinas') }}" class="nav-link"><i data-feather="book"></i><span>Disciplinas</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Caixa de mensagens</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('adm/listar-mensagem-recebidas')  }}" class="nav-link">Recebidas</a></li>
                    <li><a class="nav-link" href="{{ url('adm/listar-mensagem-enviadas') }}">Enviadas</a></li>

                </ul>
            </li>


            <!-- Fim da Logica para o Adminstrador -->
            @else
            <!-- Logica para o Professor Adicione aqui o código específico para professores -->
            @php
            $professorId = session('professorId'); // Obtém o valor de 'professorId' da sessão
            @endphp
            <li class="dropdown">
                <a href="{{ url('/docentes/home')}}" class="nav-link"><i data-feather="home"></i><span>Home</span></a>
            </li>

            <li class="dropdown ">
                <a href="{{ url('editByid/' . $professorId) }}" class="nav-link"><i data-feather="user"></i><span>Dados Pessoais</span></a>
            </li>
     

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Caixa de mensagens</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('listar-mensagem-recebidas')  }}" class="nav-link">Recebidas</a></li>
                    <li><a class="nav-link" href="{{  url('listar-mensagem-enviadas')  }}">Enviadas</a></li>

                </ul>
            </li>
            @endif

            <!-- Fim da Logica para o Professor -->

        </ul>
    </aside>
</div>