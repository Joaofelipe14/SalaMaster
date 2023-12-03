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
                    @if($mensagem = session('erro'))
                    <div class="alert alert-danger alert-dismissible alert-has-icon">
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
                                <h4>Mensagens Enviadas</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped data-table" id="tabelaProfessores">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Conteudo</th>
                                                <th>desinatario</th>
                                                <th>lido</th>

                                                <th>hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mensagens as $Mensagem)
                                            <tr>
                                                <td>{{ $Mensagem->id }}</td>
                                                <td>{{ $Mensagem->conteudo }}</td>
                                                <td>{{ $Mensagem->nome }}</td>
                                                <td>
                                                    @if( $Mensagem->lida==0)
                                                    <span class="badge badge-danger">Nao lida</span>
                                                    @else
                                                    <span class="badge badge-success">lida</span>
                                                    @endif
                                                </td>
                                                <td>{{ $Mensagem->created_at }}</td>
                                          
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
     $('#tabelaProfessores').DataTable({
            "order": [
                [0, 'desc']
            ] 
        });            $('#tabelaProfessores_filter').css({
                'display': 'flex',
                'justify-content': 'flex-end'
            });
        });
    </script>