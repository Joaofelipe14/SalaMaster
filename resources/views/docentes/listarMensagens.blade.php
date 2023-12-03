@include('welcome')
    <!-- Main Content -->

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4>Mensagens enviadas</h4>
                                <a class="btn btn-primary float-right" href="{{ route('enviar.mensagem') }}">Enviar Mensagem</a>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped data-table" id="tabelaProfessores">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Conteudo</th>
                                                <th>lida</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mensagens as $Mensagem)
                                            <tr>
                                                <td>{{ $Mensagem->id }}</td>
                                                <td>{{ $Mensagem->conteudo }}</td>
                                                <td>{{ $Mensagem->lida }}</td>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).ready(function() {
            $('#tabelaProfessores').DataTable();
            $('#tabelaProfessores_filter').css({
                'display': 'flex',
                'justify-content': 'flex-end'
            });
        });
    </script>