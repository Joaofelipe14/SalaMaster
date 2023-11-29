<!-- resources/views/professores/show.blade.php -->


    <h2>Detalhes do Professor</h2>

    <dl class="row mt-4">
        <dt class="col-sm-3">ID</dt>
        <dd class="col-sm-9">{{ $professor->id }}</dd>

        <dt class="col-sm-3">Nome</dt>
        <dd class="col-sm-9">{{ $professor->nome }}</dd>

        <dt class="col-sm-3">Endereço</dt>
        <dd class="col-sm-9">{{ $professor->endereco }}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9">{{ $professor->email }}</dd>

        <dt class="col-sm-3">Contato</dt>
        <dd class="col-sm-9">{{ $professor->contato }}</dd>
    </dl>

    <a href="{{ route('professores.index') }}" class="btn btn-secondary">Voltar</a>

