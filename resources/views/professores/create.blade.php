<!-- resources/views/professores/create.blade.php -->

@include('welcome')
<script src="{{ asset('mask/jquery.mask.min.js') }}"></script>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cadastrar Professor</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('professores.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome" minlength="10" maxlength="60"required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" id="contato" name="contato" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Endereco</label>
                                        <input type="text" class="form-control" id="endereco" name="endereco" minlength="10" maxlength="60" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CPF</label>
                                        <input type="text" class="form-control" id="cpf" name="cpf"  pattern="^(\d{3}\.?\d{3}\.?\d{3}-?\d{2})$" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                </div>
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