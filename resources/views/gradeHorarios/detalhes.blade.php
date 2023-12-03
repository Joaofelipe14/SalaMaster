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
                <span class="form-control" id="numero_sala">{{$grade->id}}</span>
            </div>

            <div class="form-group col-md-12">
                <label for="tipo" class="form-label">Disciplina</label>
                <span class="form-control" id="tipo">{{$grade->id}}</span>
            </div>
            <div class="form-group col-md-8">
                <label>Sala</label>
                <span class="form-control" id="numero_sala">{{$grade->id}}</span>
            </div>

            <div class="form-group col-md-4">
                <label for="tipo" class="form-label">Periodo</label>
                <span class="form-control" id="tipo">{{$grade->id}}</span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <form action="{{ route('gradeHorarios.destroy', $grade->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>

      </div>
    </div>
  </div>
</div>



<script>
  // Adiciona um ouvinte de evento ao botão para acionar o modal
  document.querySelector('#myModalContainer button').addEventListener('click', function() {
    $('#myModal').modal('show');
  });
</script>
