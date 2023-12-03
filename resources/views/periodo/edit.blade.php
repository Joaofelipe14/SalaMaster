<!-- resources/views/periodos/create.blade.php -->

<!-- <h2>Adicionar Período</h2>

<form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="{{ $periodo->status }}" required>
    </div>
    <div class="mb-3">
        <label for="ano_letivo" class="form-label">Ano Letivo</label>
        <input type="text" class="form-control" id="ano_letivo" name="ano_letivo" value="{{ $periodo->ano_letivo }}" required>
    </div>
    <div class="mb-3">
        <label for="data_inicio" class="form-label">Data Início</label>
        <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="{{ $periodo->data_inicio }}" required>
    </div>
    <div class="mb-3">
        <label for="data_fim" class="form-label">Data Fim</label>
        <input type="date" class="form-control" id="data_fim" name="data_fim" value="{{ $periodo->data_fim }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form> -->


<!-- resources/views/disciplina/edit.blade.php -->



    <!-- resources/views/disciplina/edit.blade.php -->
    @include('welcome')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Período</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('periodos.update', $periodo->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            @if($periodo)
                                                <option value="0" {{$periodo->status  == '0' ? 'selected' : '' }}>Não</option>
                                                <option value="1" {{$periodo->status == '1' ? 'selected' : '' }}>Sim</option>
                                
                                            @else
                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>
                                    
                                            @endif
                                        </select>
                                        
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Ano Letivo</label>
                                        <input type="text" class="form-control" id="ano_letivo" value="{{ $periodo->ano_letivo }}" name="ano_letivo" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Início do Período</label>
                                        <input type="date" class="form-control" id="data_inicio" value="{{ $periodo->data_inicio }}" name="data_inicio" required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Fim do Período</label>
                                        <input type="date" class="form-control" id="data_fim" value="{{ $periodo->data_fim }}" name="data_fim" required>
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