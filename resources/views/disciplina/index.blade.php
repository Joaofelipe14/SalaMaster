    <h2>Lista de Disciplina</h2>

    <a href="{{ route('disciplinas.create') }}" class="btn btn-primary">Adicionar Disciplina</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Carga Horaria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disciplinas as $disciplina)
            <tr>
                <td>{{ $disciplina->id }}</td>
                <td>{{ $disciplina->nome }}</td>
                <td>{{ $disciplina->carga_horaria }}</td>
                <td>
                    <a href="{{ route('disciplinas.show', $disciplina->id) }}" class="btn btn-info">Detalhes</a>
                    <a href="{{ route('disciplinas.edit', $disciplina->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>