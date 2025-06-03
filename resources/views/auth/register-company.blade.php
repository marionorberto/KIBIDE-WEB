@extends('layouts.auth')
@section('title', 'Criar Nova Empresa')
@section('content')

  <div class="auth-main">
    <div class="auth-wrapper v3">
    <div class="auth-form " style="width: 150%">
      <div class="auth-header d-flex justify-content-center">
      <a href="/" class="pt-5">
        <img class="text-center" src="{{ asset('assets/images/LOGO.png') }}" alt=""
        style="height: 120px; width: 120px;">
      </a>
      </div>
      <div class="card mb-5">
      <form method="post" action="{{ route('company.store') }}" class="card-body" enctype="multipart/form-data">
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
          <label class="form-label">Terminal Telefónico*</label>
          <input name="company_phone" type="text" class="form-control" placeholder="Terminal Telefónico"
            value="{{ old('company_phone') }}">
          </div>
        </div>
        </div>

        <div class=" row">
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Logotipo</label>
          <input name="photo" type="file" class="form-control @error('photo') is-invalid @enderror"
            accept="image/png, image/jpeg">
          @error('photo')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
          <label class="form-label">Website</label>
          <input name="site_url" type="url" class="form-control" placeholder="Ex: meu.site.com"
            value="{{ old('site_url') }}">
          </div>
        </div>
        <div class=" col-md-4">
          <div class="form-group mb-3">
          <label class="form-label">Linkedin</label>
          <input name="linkedin_url" type="url" class="form-control"
            placeholder="http:linkedin.com/nome-da-minha-conta" value="{{ old('linkedin_url') }}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group mb-3">
          <label class="form-label">Facebook</label>
          <input name="facebook_url" type="url" class="form-control"
            placeholder="Ex: https://facebook.com/minha-perfil" value="{{ old('facebook_url') }}">
          </div>
        </div>
        <div class=" col-md-4">
          <div class="form-group mb-3">
          <label class="form-label">Instagram</label>
          <input name="instagram_url" type="url" class="form-control"
            placeholder="Ex: https://instagram.com/minha-conta-instagram" value="{{ old('instagram_url') }}">
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