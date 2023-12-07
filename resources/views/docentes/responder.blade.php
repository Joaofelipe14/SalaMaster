@include('welcome')



<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Responder Mensagem</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('enviar.mensagem') }}" method="post">
                                @csrf

                                @if(empty($cadeiaDeMensagens))
                                <div class="form-group">
                                    <label for="conteudo">Mensagem enviada por: {{$mensagem->nome}} as {{$mensagem->created_at}} </label>
                                    <text disabled name="conteudo" id="conteudo" class="form-control" required>
                                    {{$mensagem->conteudo}}
                                    </text>
                                </div>
                                @else
                                <div class="container">
                                    <div class="form-group">

                                        @foreach($cadeiaDeMensagens as $mensagem)
                                        <div class="chat-message">
                                            <p>Mensagem enviada por: {{$mensagem->nome}} as {{$mensagem->created_at}}</p>
                                            <textarea disabled name="conteudo" id="conteudo" class="form-control" required>

                                        <p>{{$mensagem->conteudo}}</p>
                                        </textarea>

                                        </div>
                                        @endforeach
                                    </div>
                                    @endif



                                <div class="form-group">
                                    <label for="conteudo">Responder:</label>
                                    <textarea name="conteudo" id="conteudo" class="form-control" required></textarea>
                                </div>

                                <!-- Logica dos values para parq quando for resposta -->
                                <input type="hidden" name="idUsuario" id="idUsuario" value="{{$mensagem->destinatario_id}}">
                                <input type="hidden" name="destinatario_id" id="destinatario_id" value="{{$mensagem->remetente_id}}">
                                <input type="hidden" name="mensagem_original_id" id="mensagem_original_id" value="{{$mensagem->id}}">

                                <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>