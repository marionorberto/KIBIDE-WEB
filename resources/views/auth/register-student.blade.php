@extends('layouts.auth')
@section('title', 'registar estudante')
@section('content')

  <div class="auth-main">
    <div class="auth-wrapper v3">
    <div class="auth-form">
      <div class="auth-header">
      <a href="#"><img src="../assets/images/logo-dark.svg" alt="img"></a>
      </div>
      <div class="card my-5">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="mb-0"><b>Cadastar-se como estudante</b></h3>
        <a href="{{ route('auth.login') }}" class="link-primary">Já tem conta?</a>
        </div>
        <!-- @if ($successMessage = session('auth')) -->
        <!-- @endif -->
        <!-- @if ($successMessage = session('auth')) -->
        <!-- @endif -->
        <div class="alert alert-success" role="alert"> A simple success alert—check it out! </div>
        <div class="alert alert-danger" role="alert"> A simple success alert—check it out! </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Primeiro Nome*</label>
          <input type="text" class="form-control" placeholder="First Name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Último Nome</label>
          <input type="text" class="form-control" placeholder="Last Name">
          </div>
        </div>
        </div>

        <div class="form-group mb-3">
        <label class="form-label">Email*</label>
        <input type="email" name="email" class="form-control" placeholder="Email Address">
        </div>
        <div class="form-group mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        <div class="form-group mb-3">
        <label class="form-label">Confirmar Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Password">
        </div>
        <div class="d-grid mt-3">
        <button type="button" class="btn btn-primary">Criar Conta</button>
        </div>



      </div>
      </div>
      <div class="auth-footer row">
      <div class="col my-1">
        <p class="m-0">Copyright © <a href="#">BUKABEM</a></p>
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