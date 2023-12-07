<?php ?>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>{{ isset($titulo) ? 'Sala Master | ' . $titulo : 'Sala Master' }}</title>
<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/components.css') }}">

<!-- Custom style CSS -->
<link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />

<script src="{{ asset('js/app.min.js') }}"></script>
<!-- JS Libraries -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{ asset('js/scripts.js') }}"></script>

<script src="{{ asset('js/util.js') }}"></script>
<style>
    body {

        background-image: linear-gradient(to right, #021373, #0D0D0D)
    }

    img.logo {
        display: block;
        margin-left: auto;
        margin-right: auto
    }
</style>
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">


                    @php
                    $professorId = session('professorId'); // Obtém o valor de 'professorId' da sessão
                    @endphp
                    @if(isset($erro) && $erro)
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


                    <div class="card-header">
                        <h4>Atualizar senha
                            <img class="logo" src="/img/logo.png" width="50%">
                        </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('docentes.update-password') }}">
                            @csrf
                            <div class="form-group">
                                <label for="senha_atual">Senha atual:</label>
                                <input type="password" class="form-control" name="senha_atual" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Digite sua senha atual
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="nova_senha" class="control-label">Nova Senha:</label>
                                </div>
                                <input id="nova_senha" type="password" class="form-control" name="nova_senha" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Digite nova senha
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="confirmar_senha" class="control-label">Confirma nova Senha:</label>
                                    </div>
                                    <input id="confirmar_senha" type="password" class="form-control" name="confirmar_senha" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        Senhas nao saõ iguais.
                                    </div>
                                </div>

                                <input type="hidden" name="idUsuario" value="{{$professorId}}">

                                <div class="form-group">
                                    <button type="submit" id="submitBtn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Atualizar senha
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#confirmar_senha').on('keyup', function() {
            var novaSenha = $('#nova_senha').val();
            var confirmarSenha = $(this).val();
            var submitBtn = $('#submitBtn');

            if (novaSenha === confirmarSenha) {
                $('#confirmar_senha').removeClass('is-invalid');
                submitBtn.prop('disabled', false);
            } else {
                $('#confirmar_senha').addClass('is-invalid');
                submitBtn.prop('disabled', true);
            }
        });
    });
</script>