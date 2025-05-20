@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('users.desk.store') }}" method="post" class="card">
    @csrf


    <div class="card-header d-flex justify-content-between align-items-center">

    <h5>Criar Novo Atendente</h5>
    <a class="btn btn-primary" href="{{ route('unit.list.desks') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar um novo atendente podes editá-lo.</div>
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
      href="{{ route('unit.list.desks') }}">Ver lista para editar!</a></strong></div>
    @endif
    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Username*</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required
        value="{{ old('username') }}">
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Email*</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
      </div>
      </div>
    </div>
    <input type="hidden" name="unit_id" value="{{ Auth::user()->unit_id }}">
    <input type="hidden" name="active" value="0">

    <div class="row">
      <div class="form-group col-md-12">
      <label class="form-label" for="exampleSelect1">Função</label>
      <select class="form-select" id="exampleSelect1" disabled>
        <option>Atendente</option>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="form-label" for="exampleSelect1">Ativado/Desativado</label>
      <select name="active" class="form-select" id="exampleSelect1" disabled>
      <option value="0">Desactivado</option>
      <option value="1">Ativado</option>
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
    <button class="btn btn-primary me-2">Criar atendente</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection