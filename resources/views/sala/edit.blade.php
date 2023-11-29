<!-- resources/views/professores/edit.blade.php -->

<h2>Editar Professor</h2>

<form action="{{ route('disciplina.update', $disciplina->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ $disciplina->nome }}" required>
    </div>
    <div class="mb-3">
        <label for="carga_horaria" class="form-label">Carga Horaria</label>
        <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="{{ $disciplina->carga_horaria }}" required>
    </div>
   
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
