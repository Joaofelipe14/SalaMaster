<!-- resources/views/professores/create.blade.php -->


    <h2>Adicionar sala</h2>

    <form action="{{ route('salas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="numero_sala" class="form-label">Numero sala </label>
            <input type="text" class="form-control" id="numero_sala" name="numero_sala" required>
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo </label>
            <input type="text" class="form-control" id="tipo" name="tipo" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

