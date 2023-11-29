<!-- resources/views/professores/create.blade.php -->
    

    <h2>Adicionar Período</h2>

    <form action="{{ route('disciplinas.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="carga_horaria" class="form-label"> Carga Horaria</label>
            <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

