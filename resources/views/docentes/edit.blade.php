<!-- resources/views/professores/edit.blade.php -->
@include('welcome')


<script src="{{ asset('mask/jquery.mask.min.js') }}"></script>
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Professor</h4>
                        </div>
                        <div class="card-body">
                        <!-- {{-- Printa todas as variáveis de sessão --}}
                @foreach(session()->all() as $key => $value)
                <div>{{ $key }}: {{ is_string($value) ? htmlspecialchars($value) : json_encode($value) }}</div>
                @endforeach -->
                            <form action="{{ route('docentes.update', $professor->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" value="{{ $professor->nome }}" name="nome" minlength="10" maxlength="60" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" value="{{ $professor->email }}" name="email" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Telefone</label>
                                        <input type="tel" class="form-control" id="contato" value="{{ $professor->contato }}" name="contato" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Endereco</label>
                                        <input type="text" class="form-control" id="endereco" value="{{ $professor->endereco }}" name="endereco"  minlength="10" maxlength="60" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CPF</label>
                                        <input type="cpf" class="form-control" id="cpf" name="cpf" value="{{ $professor->cpf }}" pattern="^(\d{3}\.?\d{3}\.?\d{3}-?\d{2})$" required>
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
<script type="text/javascript">$("#contato").mask("(00) 0000-00009");</script>
<script type="text/javascript">$("#cpf").mask("000.000.000-00");</script>