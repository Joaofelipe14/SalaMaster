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
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" value="{{ $professor->nome }}" name="nome" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" value="{{ $professor->email }}" name="email" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" id="contato" value="{{ $professor->contato }}" name="contato" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Endereco</label>
                                        <input type="text" class="form-control" id="endereco" value="{{ $professor->endereco }}" name="endereco" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $professor->cpf }}" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputState">Ativo</label>
                                        <select id="inputState" class="form-control" id="status" name="status" required>
                                            @if($professor)
                                                <option value="1" {{$professor->usuario->status == 1 ? 'selected' : '' }}>Sim</option>
                                                <option value="0" {{$professor->usuario->status == 0 ? 'selected' : '' }}>Não</option>
                                            @else
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>
                                            @endif
                                        </select>
                                    </div>
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