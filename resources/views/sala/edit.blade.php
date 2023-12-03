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
                            <h4>Editar sala</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('salas.update', $sala->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label>Nome sala</label>
                                        <input type="text" class="form-control" id="numero_sala" value="{{$sala->numero_sala}}" name="numero_sala"  maxlength="30" required>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="tipo" class="form-label">Tipo </label>
                                        <input type="text" class="form-control" id="tipo"  value="{{$sala->tipo}}"name="tipo" minlength="4" maxlength="30" required>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                    <a class="btn btn-dark" href="{{ route('salas.index') }}">Voltar</a>
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