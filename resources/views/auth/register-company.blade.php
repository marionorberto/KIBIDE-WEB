@extends('layouts.auth')
@section('title', 'registar mentor')
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
      <form method="post" action="{{ route('company.store') }}" class="card-body">
        @csrf

        @if ($errors->any())
        <ul class="alert alert-danger ">
        @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
      @endforeach
        </ul>
      @endif

        <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="mb-0"><b>Cadastar a sua Empresa</b></h3>
        <a href="{{ route('auth.login.show') }}" class="link-primary">Já tem conta?</a>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Nome da Empresa*</label>
          <input name="company_name" type="text" class="form-control" placeholder="Nome da Empresa" required
            value="{{ old('company_name') }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Correio Electrônico*</label>
          <input name="company_email" type="email" class="form-control" placeholder="Correio Electrônico" required
            value="{{ old('company_email') }}">
          </div>
        </div>
        </div>
        <div class=" form-group mb-3">
        <label class="form-label">NIF*</label>
        <input type="text" name="company_nif" class="form-control" placeholder="NIF" required
          value="{{ old('company_nif') }}">
        </div>

        <div class=" row">
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Endereço</label>
          <input name="company_address" type="text" class="form-control" placeholder="Endereço"
            value="{{ old('company_address') }}">
          </div>
        </div>
        <div class=" col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Terminal Telefónico</label>
          <input name="company_phone" type="text" class="form-control" placeholder="Terminal Telefónico"
            value="{{ old('company_phone') }}">
          </div>
        </div>
        </div>

        <hr>
        <h5>Usuário Administrador</h5>

        <div class=" row">
        <input type="hidden" name="role" value="admin">


        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Username*</label>
          <input type="text" name="username" class="form-control" placeholder="Username" required
            value="{{ old('username') }}">
          </div>
        </div>
        <div class=" col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Email*</label>
          <input type="email" name="email" class="form-control" placeholder="Email" required
            value="{{ old('email') }}">
          </div>
        </div>
        </div>

        <div class=" form-group mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="form-group mb-3">
        <label class="form-label">Confirmar Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Password"
          required>
        </div>


        <div class="d-grid mt-3">
        <button type="submit" class="btn btn-primary">Criar Conta</button>
        </div>
        <div class="saprator mt-3">
        <span>KIBIDE</span>
        </div>


      </form>
      </div>
      <div class="auth-footer row">
      <div class="col my-1">
        <p class="m-0">Copyright © <a href="/">KIBIDE</a></p>
      </div>
      <div class="col-auto my-1">
        <ul class="list-inline footer-link mb-0">
        <li class="list-inline-item"><a href="/">Home</a></li>
        </ul>
      </div>
      </div>
    </div>
    </div>
  </div>


@endsection