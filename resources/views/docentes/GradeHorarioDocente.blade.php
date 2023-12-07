
@include('welcome')
<!-- Main Content -->

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                @if($mensagem = session('successo'))
                <div class="alert alert-success alert-dismissible alert-has-icon">
                    <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">{{ $mensagem }}</div>
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4>Lista Vínculos Grade</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped data-table" id="tabelaProfessores">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Diciplina</th>
                                            <th>Sala</th>
                                            <th>Periodo</th>
                                            <th class="nosort">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gradeHorarios as $gradeHorario)
                                        <tr>
                                            <td>{{ $gradeHorario->nome}}</td>
                                            <td>{{ $gradeHorario->disciplina }}</td>
                                            <td>{{ $gradeHorario->numero_sala }}</td>
                                            <td>{{ $gradeHorario->ano_letivo }}</td>
                                            <td>
                                            <a href="{{ url('/docentes/gradeHorariosDocente/'. $gradeHorario->id) }}" class="btn btn-icon btn-primary" ><i class="far fa-eye"></i></a>
                                             
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- Modal -->
    @if(isset($grade))
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detalhe Vínculos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Professor</label>
                                <span class="form-control" id="numero_sala">{{$grade->nome_professor}}</span>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="tipo" class="form-label">Disciplina</label>
                                <span class="form-control" id="tipo">{{$grade->nome_disciplina}}</span>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Sala</label>
                                <span class="form-control" id="numero_sala">{{$grade->numero_sala}}</span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="tipo" class="form-label">Periodo</label>
                                <span class="form-control" id="tipo">{{$grade->ano_letivo}}</span>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="tipo" class="form-label">Horários</label>
                                <span class="form-control" id="tipo">{{$grade->horarios}}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Dias da Semana</label>
                                <div class="day-buttons">
                                    <button type="button" class="circle-button {{ $grade->domingo == 'S' ? 's' : '' }}">DOM</button>
                                    <button type="button" class="circle-button {{ $grade->segunda == 'S' ? 's' : '' }}">SEG</button>
                                    <button type="button" class="circle-button {{ $grade->terca   == 'S' ? 's' : '' }}">TER</button>
                                    <button type="button" class="circle-button {{ $grade->quarta  == 'S' ? 's' : '' }}">QUA</button>
                                    <button type="button" class="circle-button {{ $grade->quinta  == 'S' ? 's' : '' }}">QUI</button>
                                    <button type="button" class="circle-button {{ $grade->sexta   == 'S' ? 's' : '' }}">SEX</button>
                                    <button type="button" class="circle-button {{ $grade->sabado  == 'S' ? 's' : '' }}">SÁB</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
            
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            
            .day-buttons {
            display: flex;
            padding-top: 5px;
            align-items:flex-end;
            }

            .circle-button {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #E9ECEF;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 10px;
                border: none;
                border-radius: 50%;
                font-size: 0.6em;
                }

            .circle-button.s {
                background-color: #4CAF50;
                color: white;
            }
        </style>

        <!-- Script para abrir o modal automaticamente -->
        <script>
            $(document).ready(function () {
                $('#myModal').modal('show');
            });
        </script>
    @endif


<script>
    $(document).ready(function() {
            $('#tabelaProfessores').DataTable();
            $('#tabelaProfessores_filter').css({
                'display': 'flex',
                'justify-content': 'flex-end'
            });
        });
</script>