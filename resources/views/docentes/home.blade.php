@include('welcome')


<!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                {{-- Printa todas as variáveis de sessão --}}
                @foreach(session()->all() as $key => $value)
                <div>{{ $key }}: {{ is_string($value) ? htmlspecialchars($value) : json_encode($value) }}</div>
                @endforeach

                {{-- Exibe a mensagem de sucesso --}}
                @if($mensagem = session('successo'))
                    <div class="alert alert-success alert-dismissible alert-has-icon">
                        <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">{{ $mensagem }}</div>
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
</div>