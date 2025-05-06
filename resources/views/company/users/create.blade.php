@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('users.store') }}" method="post" class="card">
    @csrf


    <div class="card-header d-flex justify-content-between align-items-center">

    <h5>Criar Novo Usuário</h5>
    <a class="btn btn-primary" href="{{ route('company.list.users') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar um novo usuário podes editá-lo.</div>
      </div>
    </div>
    @endif

    @if ($errors->any())
    <ul class="alert alert-danger ">
      @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
    @endforeach
    </ul>
    @endif

    @if ($successMessage = session('success'))
    <div class="alert alert-success" role="alert"> {{ $successMessage }} <strong><a
      href="{{ route('company.list.users') }}">Ver lista para editar!</a></strong></div>
    @endif


    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Username*</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Email*</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required>
      </div>
      </div>
    </div>

    <input type="hidden" name="company_id" value="{{ Auth::user()->company_id }}">

    <div class="row">
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Associar à unidade</label>
      <select name="unit_id" class="form-select" id="exampleSelect1">
        @foreach ($units as $unit)
      <option value="{{ $unit->id_unit }}">{{ $unit->unit_name }}</option>
      @endforeach
      </select>
      </div>
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Função</label>
      <select class="form-select" id="exampleSelect1" disabled>
        <option>Gerente</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label" for="exampleSelect1">Ativado/Desativado</label>
      <select name="active" class="form-select" id="exampleSelect1">
      <option value="1">Ativado</option>
      <option value="0">Desactivado</option>
      </select>
    </div>
    <div class="row">
      <div class="form-group mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="form-group mb-3 col-12">
      <label class="form-label">Confirmar Password</label>
      <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Password"
        required>
      </div>
    </div>
    </div>



    <div class="card-footer">
    <button class="btn btn-primary me-2">Criar Usuário</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection