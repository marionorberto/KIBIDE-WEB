@extends('layouts.auth')

@section('title', 'Esqueci a senha')

@section('content')

  <div class="auth-main">
    <div class="auth-wrapper v3">
    <div class="auth-form">
      <div class="auth-header">
      <a href="/">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="" style="height: 70px; width: 70px;">
      </a>
      </div>
      <div class="card my-5">
      <form method="post" action="{{ route('auth.forgot.submit') }}" class="card-body">
        @csrf
        <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="mb-0"><b>Esqueci a senha</b></h3>
        <a href="{{ route('auth.login.show') }}" class="link-primary">Voltar para Login</a>
        </div>
        <div class="form-group mb-3">
        <label class="form-label">Email </label>
        <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email" required
          value="{{ old('email') }}">
        </div>
        <p class="mt-4 text-sm text-muted">Não esqueça de checar a caixa <strong>SPAN</strong>.</p>
        <div class="d-grid mt-3">
        <button type="submit" class="btn btn-primary">Submeter</button>
        </div>
      </form>
      </div>
      <div class="auth-footer row">
      <!-- <div class=""> -->
      <div class="col my-1">
        <p class="m-0">Copyright © <a href="#">Bukabem</a></p>
      </div>
      <div class="col-auto my-1">
        <ul class="list-inline footer-link mb-0">
        <li class="list-inline-item"><a href="/">Home</a></li>
        </ul>
      </div>
      <!-- </div> -->
      </div>
    </div>
    </div>
  </div>

@endsection