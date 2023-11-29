<h2>Lista de Salas</h2>

<a href="{{ route('salas.create') }}" class="btn btn-primary">Adicionar Disciplina</a>

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
                <a href="{{ route('salas.show', $disciplina->id) }}" class="btn btn-info">Detalhes</a>
                <a href="{{ route('salas.edit', $disciplina->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('salas.destroy', $disciplina->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>