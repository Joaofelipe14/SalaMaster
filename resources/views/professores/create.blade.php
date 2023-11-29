<!-- resources/views/professores/create.blade.php -->


    <h2>Adicionar Professor</h2>

    <form action="{{ route('professores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="contato" class="form-label">Contato</label>
            <input type="text" class="form-control" id="contato" name="contato" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Se houver uma mensagem de erro, exiba uma notificação
        @if(session('error'))
            setTimeout(function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: '{{ session('error') }}',
                });
            }, 500);
        @endif

        // Se houver uma senha gerada com sucesso, exiba uma notificação
        @if(session('success'))
            setTimeout(function () {
                Toast.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: 'Professor cadastrado com sucesso! Senha gerada: {{ session('success') }}',
                });
            }, 500);
        @endif
    });
</script>
