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
                            <h4>Cadastrar Disciplinas</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('disciplinas.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" minlength="4" maxlength="30"required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label> Carga Horaria</label>
                                        <select class="form-control" id="carga_horaria" name="carga_horaria" required>
                                            <option value="30">30 horas</option>
                                            <option value="60" selected>60 horas</option>
                                            <option value="90">90 horas</option>
                                        </select>
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