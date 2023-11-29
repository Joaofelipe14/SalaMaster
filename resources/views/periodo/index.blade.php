<!-- resources/views/periodos/index.blade.php -->

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
    </table>

