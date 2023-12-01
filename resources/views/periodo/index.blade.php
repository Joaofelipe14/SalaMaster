<!-- resources/views/periodos/index.blade.php -->
<!-- 
    <h2>Lista de Períodos</h2>

    <a href="{{ route('periodos.create') }}" class="btn btn-primary">Adicionar Período</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Ano Letivo</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periodos as $periodo)
                <tr>
                    <td>{{ $periodo->id }}</td>
                    <td>{{ $periodo->status }}</td>
                    <td>{{ $periodo->ano_letivo }}</td>
                    <td>{{ $periodo->data_inicio }}</td>
                    <td>{{ $periodo->data_fim }}</td>
                    <td>
                        <a href="{{ route('periodos.show', $periodo->id) }}" class="btn btn-info">Detalhes</a>
                        <a href="{{ route('periodos.edit', $periodo->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('periodos.destroy', $periodo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> -->



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
                            <h4>Lista de Periodos</h4>
                            <a class="btn btn-primary float-right" href="{{ route('periodos.create') }}">Cadastrar</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped data-table" id="tabelaProfessores">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Ano Letivo</th>
                                            <th>Data Início</th>
                                            <th>Data Fim</th>
                                            <th class="nosort">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($periodos as $disciplina)
                                        <tr>
                                            <td>{{ $periodo->id }}</td>
                                            <td>{{ $periodo->status }}</td>
                                            <td>{{ $periodo->ano_letivo }}</td>
                                            <td>{{ $periodo->data_inicio }}</td>
                                            <td>{{ $periodo->data_fim }}</td>
                                            <td>
                                                <a href="{{ route('periodos.edit', $periodo->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                @if(isset($disciplina->id))
                                                <form action="{{ route('periodos.destroy', $periodo->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
                                                </form>
                                                @endif
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
    });
</script>