@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('units.store') }}" method="post" class="card">
    @csrf




    <div class="card-header d-flex justify-content-between align-items-center">

    <h5>Criar Nova Unidade</h5>
    <a class="btn btn-primary" href="{{ route('company.list.users') }}">Ver Todas</a>
    </div>
    <div class="card-body">

    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar uma nova unidade deves associar ela à um usuário gerente criado.</div>
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
      href="{{ route('company.create.users') }}">Criar usuário agora!</a></strong></div>
    @endif
    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Nome da Unidade</label>
        <input type="text" name="unit_name" class="form-control" placeholder="Nome da Unidade" required
        value="{{ old('unit_name') }}">
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Email da Unidade</label>
        <input type="email" name="unit_email" class="form-control" placeholder="Email da Unidade" required
        value="{{ old('unit_email') }}">
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Telefone da Unidade</label>
        <input type="text" name="unit_phone" class="form-control" placeholder="Telefone da Unidade" required
        value="{{ old('unit_phone') }}">
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Endereço da Unidade</label>
        <input type="text" name="unit_address" class="form-control" placeholder="Endereço da Unidade" required
        value="{{ old('unit_address') }}">
      </div>
      </div>
    </div>



    <div class="form-group">
      <label class="form-label" for="exampleSelect1">Ativada/Desativada</label>
      <select class="form-select" id="exampleSelect1" disabled>
      <option value="0">Desactivada</option>
      </select>
    </div>
    <div class="col-md-12">
      <div class="form-group mb-3">
      <input type="text" class="form-control" placeholder=""
        value="APÓS O CADASTRO DA AGENCIA CRIE UM NOVO USUÁRIO GERENTE PARA ASSOCIAR À UNIDADE" disabled>
      </div>
    </div>
    </div>



    <div class="card-footer">
    <button type="submit" class="btn btn-primary me-2">Criar Unidade</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection