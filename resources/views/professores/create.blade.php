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
                            <h4>Cadastrar Professor</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('professores.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Contato</label>
                                        <input type="text" class="form-control" id="contato" name="contato" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Endereco</label>
                                        <input type="text" class="form-control" id="endereco" name="endereco" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" required>
                                    </div>
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