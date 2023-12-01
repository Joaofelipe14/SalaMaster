<!-- resources/views/periodos/create.blade.php


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
                            <h4>Cadastrar Peridos</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('periodos.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <input type="text" class="form-control" id="status"  name="status" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Ano Letivo</label>
                                        <input type="text" class="form-control" id="ano_letivo"  name="ano_letivo" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Carga Horaria</label>
                                        <input type="date" class="form-control" id="data_inicio"  name="data_inicio" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Carga Horaria</label>
                                        <input type="date" class="form-control" id="data_fim"  name="data_fim" required>
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