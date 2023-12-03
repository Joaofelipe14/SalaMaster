@include('welcome')



<div class="main-content">
    <section class="section">
        <div class="section-body">
            <h2>Enviar Mensagem</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('enviar.mensagem') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="conteudo">Conteúdo da Mensagem:</label>
                    <textarea name="conteudo" id="conteudo" class="form-control" required></textarea>
                </div>

                @php
                $professorId = session('professorId'); // Obtém o valor de 'professorId' da sessão
                @endphp
                <input type="hidden" name="idUsuario" id="idUsuario" value="{{$professorId}}">

                <div class="form-group">
                    <label for="destinatario_id">Destinatário:</label>
                    <select name="destinatario_id" id="destinatario_id" class="form-control" required>
                        @foreach($Usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->administradores->nome }}</option>
                        @endforeach
                    </select>
                </div>





                <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
            </form>
        </div>

</div>