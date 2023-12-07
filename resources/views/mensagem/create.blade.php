@include('welcome')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Escrever Mensagem</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enviarAdm.mensagem') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="conteudo">Conteúdo da Mensagem:</label>
                                    <textarea name="conteudo" id="conteudo" class="form-control" required></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="destinatario_id">Destinatário:</label>
                                    <select name="destinatario_id" id="destinatario_id" class="form-control" required>
                                        @foreach($Usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{ $usuario->nome}}</option>
                                        @endforeach

                                    </select>


                                </div>

                                <!-- //fixo que o admin vai sempre enviar -->
                                <input type="hidden" name="idUsuario" id="idUsuario" value="1">


                                <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>