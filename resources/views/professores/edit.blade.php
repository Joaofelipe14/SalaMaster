<!-- resources/views/professores/edit.blade.php -->
@include('welcome')

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
                            <form action="{{ route('professores.update', $professor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" value="{{ $professor->nome }}" name="nome" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" value="{{ $professor->email }}" name="email" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Contato</label>
                                        <input type="text" class="form-control" id="contato" value="{{ $professor->contato }}" name="contato" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Endereco</label>
                                        <input type="text" class="form-control" id="endereco" value="{{ $professor->endereco }}" name="endereco" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>CPF</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $professor->cpf }}" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="{{ $professor->usuario->status }}" required>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>
</div>