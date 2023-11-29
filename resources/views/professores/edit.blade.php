<!-- resources/views/professores/edit.blade.php -->

    <h2>Editar Professor</h2>

    <form action="{{ route('professores.update', $professor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $professor->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $professor->endereco }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $professor->email }}" required>
        </div>
        <div class="mb-3">
            <label for="contato" class="form-label">Contato</label>
            <input type="text" class="form-control" id="contato" name="contato" value="{{ $professor->contato }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
