<!-- <h2>Lista de Salas</h2>

<a href="{{ route('salas.create') }}" class="btn btn-primary">Adicionar sala</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Carga Horaria</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salas as $sala)
        <tr>
            <td>{{ $sala->id }}</td>
            <td>{{ $sala->nome }}</td>
            <td>{{ $sala->carga_horaria }}</td>
            <td>
                <a href="{{ route('salas.show', $sala->id) }}" class="btn btn-info">Detalhes</a>
                <a href="{{ route('salas.edit', $sala->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('salas.destroy', $sala->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
 -->



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
                            <h4>Lista de salas</h4>
                            <a class="btn btn-primary float-right" href="{{ route('salas.create') }}">Cadastrar</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped data-table" id="tabelaProfessores">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Numero sala</th>
                                            <th>Tipo</th>
                                            <th class="nosort">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($salas as $sala)
                                        <tr>
                                            <td>{{ $sala->id }}</td>
                                            <td>{{ $sala->numero_sala }}</td>
                                            <td>{{ $sala->tipo }}</td>
                                            <td>
                                                <a href="{{ route('salas.edit', $sala->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                @if(isset($sala->id))
                                                <form action="{{ route('salas.destroy', $sala->id) }}" method="POST" style="display: inline;">
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