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
                            <h4>Editar Disciplinas</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('disciplinas.update', $disciplina->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" value="{{ $disciplina->nome }}" name="nome" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Carga Horaria</label>
                                        <input type="carga_horaria" class="form-control" id="carga_horaria" value="{{ $disciplina->carga_horaria }}" name="carga_horaria" required>
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