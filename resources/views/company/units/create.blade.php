@extends('layouts.dashboard')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('units.store') }}" method="post" class="card">
    @csrf
    <!-- 'manager_id', -->

    <div class="card-header d-flex justify-content-between align-items-center">

    <h5>Criar Nova Unidade</h5>
    <a class="btn btn-primary" href="{{ route('company.list.users') }}">Ver Todas</a>
    </div>
    <div class="card-body">
    @if ($errors->any())
    <ul class="alert alert-danger ">
      @foreach ($errors->all() as $error)
      <li class="ps-1">{{ $error }}</li>
    @endforeach
    </ul>
    @endif
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3"> Para criar uma nova unidade deves ter um GERENTE criado e disponível para a esta
        unidade.</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Nome da Unidade</label>
        <input type="text" name="unit_name" class="form-control" placeholder="Nome da Unidade" required>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Email da Unidade</label>
        <input type="email" name="unit_email" class="form-control" placeholder="Email da Unidade" required>
      </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Telefone da Unidade</label>
        <input type="text" name="unit_phone" class="form-control" placeholder="Telefone da Unidade" required>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Endereço da Unidade</label>
        <input type="text" name="unit_address" class="form-control" placeholder="Endereço da Unidade" required>
      </div>
      </div>
    </div>

    <input type="hidden" name="company_id" value="{{ Auth::user()->company_id }}">

    @if ($managersAvailable)
      @foreach ($managersAvailable as $manager)
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Gerentes Disponíveis</label>
      <select name="role" class="form-select" id="exampleSelect1">
      <option value="manager">testando1</option>
      <option value="desk">testando2</option>
      </select>
      </div>
      @endforeach
    @else
    <div class="col-md-12">
      <div class="form-group mb-3">
      <input type="text" name="manager_id" class="form-control" placeholder=""
      value="Nenhum Gerente disponível, POR FAVOR CRIE UM NOVO USUÁRIO GERENTE PARA ASSOCIAR À UNIDADE" disabled>
      </div>
    </div>
    @endif

    <div class="form-group">
      <label class="form-label" for="exampleSelect1">Ativada/Desativada</label>
      <select name="active" class="form-select" id="exampleSelect1">
      <option value="1">Ativada</option>
      <option value="0">Desactivada</option>
      </select>
    </div>

    </div>



    <div class="card-footer">
    <button class="btn btn-primary me-2">Criar Unidade</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection