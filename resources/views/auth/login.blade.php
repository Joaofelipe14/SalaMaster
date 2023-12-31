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


          @if($mensagem = session('erro'))
          <div class="alert alert-danger alert-dismissible alert-has-icon">
            <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
            <div class="alert-body">
              <div class="alert-title">Erro !!</div>
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              {{ $mensagem }}
            </div>
          </div>
          @endif

          <div class="card-header">
            <h4>Login
              <img class="logo" src="/img/logo3.png" width="100%">
            </h4> 
          </div>

          <div class="card-body">
            <form method="POST" action="{{ url('/logar') }}">
              @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Digite seu email
                </div>
              </div>
              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Senha</label>
                  <div class="float-right">
                    <a href="{{ route('password.request') }}" class="text-small">
                      Esqueceu a senha?
                    </a>
                  </div>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  Digite sua senha
                </div>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Lembre-me</label>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  Entrar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>