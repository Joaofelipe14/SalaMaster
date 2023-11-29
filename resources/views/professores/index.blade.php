    <h2>Lista de Professores</h2>

    <a href="{{ route('professores.create') }}" class="btn btn-primary">Adicionar Professor</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professores as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->nome }}</td>
                    <td>{{ $professor->email }}</td>
                    <td>
                        <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-info">Detalhes</a>
                        <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
