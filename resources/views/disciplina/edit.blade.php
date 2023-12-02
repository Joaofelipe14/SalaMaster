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
                                       <select class="form-control" id="carga_horaria" name="carga_horaria" required>
                                            @if($disciplina)
                                                <option value="30" {{$disciplina->carga_horaria == '30' ? 'selected' : '' }}>30 horas</option>
                                                <option value="60" {{$disciplina->carga_horaria == '60' ? 'selected' : '' }}>60 horas</option>
                                                <option value="90" {{$disciplina->carga_horaria == '90' ? 'selected' : '' }}>90 horas</option>
                                            @else
                                                <option value="30">30 horas</option>
                                                <option value="60">60 horas</option>
                                                <option value="90">90 horas</option>
                                            @endif
                                        </select>
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