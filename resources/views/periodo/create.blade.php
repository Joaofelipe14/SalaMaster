<!-- resources/views/periodos/create.blade.php -->


    <h2>Adicionar Período</h2>

    <form action="{{ route('periodos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <div class="mb-3">
            <label for="ano_letivo" class="form-label">Ano Letivo</label>
            <input type="text" class="form-control" id="ano_letivo" name="ano_letivo" required>
        </div>
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data Início</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">Data Fim</label>
            <input type="date" class="form-control" id="data_fim" name="data_fim" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

