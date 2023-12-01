    @include('welcome')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4>Lista de Professores</h4>
                                <a class="btn btn-primary float-right" href="{{ route('professores.create') }}">Cadastrar</a>
                            </div>
                            <div class="card-body">

                                @if($mensagem = session('successo'))
                                <div class="alert alert-success alert-dismissible alert-has-icon">
                                    <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">DEU BOM !!</div>
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ $mensagem }}
                                    </div>
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>CPF</th>
                                                <th>Status</th>
                                                <th class="nosort">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($professores as $professor)
                                            <tr>

                                                <td>{{ $professor->id }}</td>
                                                <td>{{ $professor->nome }}</td>
                                                <td>{{ $professor->email }}</td>
                                                <td>{{ $professor->cpf }}</td>
                                                <td>
                                                    @if($professor->usuario->status == 1)
                                                    <span class="badge badge-success">Ativo</span>
                                                    @else
                                                    <span class="badge badge-danger">Desativo</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                    <a href=" <?php url('restrita/sistema')  ?>       " class="btn btn-icon btn-danger delete" data-confirm="Deseja apagar a Marca?"><i class="fas fa-times"></i></a>

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

    <!-- 
    <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </form> -->