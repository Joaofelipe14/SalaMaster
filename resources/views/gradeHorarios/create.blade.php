

@include('welcome')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cadastrar Vínculo Grade Horários</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('gradeHorarios.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label class="form-label">Professor</label>
                                        <select id="inputState" class="form-control" id="professor_id" name="professor_id" required>
                                            @foreach ($professores as $professor)
                                                <option required value="{{ $professor->id }}">{{ $professor->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label">Disciplina</label>
                                        <select id="inputState" class="form-control" id="disciplina_id" name="disciplina_id" required>
                                            @foreach ($disciplinas as $disciplina)
                                                <option required value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-label">Sala</label>
                                        <select id="inputState" class="form-control" id="sala_id" name="sala_id" required>
                                            @foreach ($salas as $sala)
                                                <option required value="{{ $sala->id }}">{{ $sala->numero_sala }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="form-label">Periodo</label>
                                        <select id="inputState" class="form-control" id="periodo_id" name="periodo_id" required>
                                            @foreach ($periodos as $periodo)
                                                <option required value="{{ $periodo->id }}">{{ $periodo->ano_letivo }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Adicione os arquivos CSS e JS do Bootstrap -->
                                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
                                    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

                                    <div class="form-group col-md-6">
                                        <label for="horarios">Grupos de Horários</label>
                                        <select name="horarios[]" id="horarios" multiple>
                                            @foreach ($horarios as $horario)
                                            <option required value="{{ $horario->id }}">{{$horario->horario_inicio }}/{{ $horario->horario_fim}} - {{ $horario->nome_horario}} </option>
                                            @endforeach
                                        </select>
                                        <script>
                                            new MultiSelectTag('horarios'); // id
                                        </script>
                                    </div>

                                    <!-- dias da semana -->

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
                                    cursor: pointer;
                                    border: none;
                                    font-size: 0.6em;
                                    
                                    }

                                    .selected {
                                    background-color: #4F5ECE;
                                    color: #E9ECEF;
                                    }
                                </style>

                                    <div class="form-group col-md-6 diasdiv">
                                        <label>Dias da Semana</label>
                                        <div class="day-buttons">
                                            <button type="button" class="circle-button" id="domingo" onclick="toggleSelection('domingo')">DOM</button>
                                            <button type="button" class="circle-button" id="segunda" onclick="toggleSelection('segunda')">SEG</button>
                                            <button type="button" class="circle-button" id="terca" onclick="toggleSelection('terca')">TER</button>
                                            <button type="button" class="circle-button" id="quarta" onclick="toggleSelection('quarta')">QUA</button>
                                            <button type="button" class="circle-button" id="quinta" onclick="toggleSelection('quinta')">QUI</button>
                                            <button type="button" class="circle-button" id="sexta" onclick="toggleSelection('sexta')">SEX</button>
                                            <button type="button" class="circle-button" id="sabado" onclick="toggleSelection('sabado')">SÁB</button>
                                        </div>
                                        <input type="hidden" name="dias_semana" id="dias_semana" value="">
                                    </div>
                                    <script>
                                        function toggleSelection(day) {
                                            const button = document.getElementById(day);
                                            button.classList.toggle('selected');

                                            // Atualiza o campo oculto com os dias selecionados
                                            const diasSelecionados = Array.from(document.querySelectorAll('.circle-button.selected')).map(button => button.id);
                                            document.getElementById('dias_semana').value = diasSelecionados.join(',');
                                        }
                                    </script>
                                </div>             
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>