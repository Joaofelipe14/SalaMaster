@if(!empty($erro))
    <div class="alert alert-danger alert-dismissible alert-has-icon">
        <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
        <div class="alert-body">
            <div class="alert-title">Erro !!</div>
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ $erro }}
        </div>
    </div>
@endif


<form method="POST" action="{{ route('docentes.update-password') }}">
    @csrf
    <!-- {{$professorId}} -->
    <!-- Adicione um campo oculto para o idUsuario -->

    <div class="form-group">
        <label for="senha_atual">Senha Atual:</label>
        <input type="password" id="senha_atual" name="senha_atual" required>
    </div>

    <div class="form-group">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required>
    </div>

    <div class="form-group">
        <label for="confirmar_senha">Confirmar Nova Senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required>
    </div>
    <input type="hidden" name="idUsuario" value="{{$professorId}}">

    <button type="submit">Atualizar Senha</button>
</form>
