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



                                <div class="table-responsive">
                                    <table class="table table-striped data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>ID</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th class="nosort">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($professores as $professor)
                                            <tr>

                                                <td>{{ $professor->id }}</td>
                                                <td>{{ $professor->nome }}</td>
                                                <td>{{ $professor->email }}</td>

                                                <td>
                                                    <a href="{{ route('professores.edit', $professor->id) }} ; ?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                                                    <!-- <a href="<?php url('restrita/sistema')  ?>" class="btn btn-icon btn-danger delete" data-confirm="Deseja apagar a Marca?"><i class="fas fa-times"></i></a> -->
                                                    <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                                    </form>
                                                </td>

                                                <!-- <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form> -->
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