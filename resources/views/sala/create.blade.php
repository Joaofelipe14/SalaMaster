<!-- resources/views/professores/create.blade.php -->


<!-- <h2>Adicionar sala</h2>

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
 -->


<!-- resources/views/professores/create.blade.php -->

@include('welcome')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cadastrar salas</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('salas.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Numero sala</label>
                                        <input type="text" class="form-control" id="numero_sala" name="numero_sala" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="tipo" class="form-label">Tipo </label>
                                        <input type="text" class="form-control" id="tipo" name="tipo" required>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>