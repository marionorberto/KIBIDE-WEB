@extends('layouts.auth')

@section('title', 'Login')

@section('content')

  <div class="auth-main">
    <div class="auth-wrapper v3">
    <div class="auth-form">
      <div class="auth-header d-flex justify-content-center">
      <a href="/" class="pt-5">
        <img class="text-center" src="{{ asset('assets/images/LOGO.png') }}" alt=""
        style="height: 120px; width: 120px;">
      </a>
      </div>
      <div class="card mb-5">
      <form action="{{ route('auth.login') }}" method="post" class="card-body">
        @csrf
        @if ($successMessage = session('success'))
      <div class="alert alert-success" role="alert"> {{ $successMessage }}</div>
      @endif
        @if ($errorMessage = session('error'))
      <div class="alert alert-danger" role="alert"> {{ $errorMessage }}</div>
      @endif
        <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="mb-0"><b>Entrar</b></h3>
        <a href="{{ route('company.create') }}" class="link-primary">Criar Conta?</a>
        </div>


        <div class="form-group mb-3">
        <label class="form-label">Username </label>
        <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}"
          required>
        </div>
        <div class="form-group mb-3">
        <div class="position-relative">
          <label class="form-label">Password</label>
          <input id="login-password-input" type="password" name="password" class="form-control"
          placeholder="Password" required>
          <i id="change-password-visibility" class="ti ti-eye fs-4 position-absolute cursor-pointer "
          style="top: 55%; right: 10px; cursor: pointer"></i>
        </div>
        </div>
        <div class="d-flex mt-1 justify-content-end">

        <a href="{{ route('auth.forgot') }}" class="text-secondary f-w-400">Esqueceu a senha?</a>
        </div>
        <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary">Entrar</button>
        <div class="saprator mt-3">
          <span>KIBIDE</span>
        </div>
        </div>
      </form>
      </div>

      <div class="auth-footer row">
      <!-- <div class=""> -->
      <div class="col my-1">
        <p class="m-0">Copyright © <a href="/">KIBIDE</a></p>
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

  <script>
    const changePasswordVisibility = document.getElementById('change-password-visibility');
    const loginPasswordInput = document.getElementById('login-password-input');

    changePasswordVisibility.addEventListener('click', (e) => {
    if (changePasswordVisibility.classList.contains('ti-eye')) {
      changePasswordVisibility.classList.replace('ti-eye', 'ti-lock');
      loginPasswordInput.removeAttribute('type');
      loginPasswordInput.setAttribute('type', 'text');
    }
    else if (changePasswordVisibility.classList.contains('ti-lock')) {
      changePasswordVisibility.classList.replace('ti-lock', 'ti-eye');
      loginPasswordInput.removeAttribute('type');
      loginPasswordInput.setAttribute('type', 'password');
    }
    })
  </script>
@endsection