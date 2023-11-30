<link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <!-- Custom style CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('/css/custom.css') }}"> -->
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('img/favicon.ico') }}"/>
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

            <li class="dropdown">
                <a href="{{ url('restrita') }}" class="nav-link"><i data-feather="home"></i><span>Home</span></a>
            </li>

            <li class="dropdown ">
                <a href="{{ url('professores') }}" class="nav-link"><i data-feather="users"></i><span>Professores</span></a>
            </li>

            <li class="dropdown ">
                <a href="{{ url('restrita/marcas') }}" class="nav-link"><i data-feather="star"></i><span>Grades Horários</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="package"></i><span>Salas e Periodos</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('restrita/master') }}">Salas</a></li>
                    <li><a class="nav-link" href="{{ url('restrita/categorias') }}">Períodos Letivos</a></li>
                </ul>
            </li>

            <li class="dropdown ">
                <a href="{{ url('restrita/produtos') }}" class="nav-link"><i data-feather="archive"></i><span>Disciplinas</span></a>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="settings"></i><span>Configurações</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('restrita/sistema') }}">Sistema</a></li>
                    <li><a class="nav-link" href="{{ url('restrita/sistema/correios') }}">Correios</a></li>
                    <li><a class="nav-link" href="{{ url('restrita/sistema/pagseguro') }}">Pagseguro</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
