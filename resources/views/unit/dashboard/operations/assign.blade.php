@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.assign.operation') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5>Atribuição de Operação diária</h5>
    <a class="btn btn-primary" href="{{ route('unit.services.list') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após atribuir uma nova operação podes editá-la.</div>
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
      href="{{ route('unit.list.operation') }}">Ver lista para editar!</a></strong></div>
    @endif

    @if ($successMessage = session('danger'))
    <div class="alert alert-warning" role="alert"> {{ $successMessage }} <strong><a
      href="{{ route('unit.list.operation') }}">Editar ou Exclutir operações !</a></strong></div>
    @endif

    @if (session('error'))
    <ul class="alert alert-danger ">
      <li class="ps-1">{{ session('error') }}</li>
    </ul>
    @endif

    <div id="mensagemErro" class="alert alert-danger d-none" role="alert"></div>
    <div class="row">

    </div>
    <div class="row">
      <div class="col-md-12">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Data de Realização</label>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="input-group date">
          <input name="realization_date" type="date" class="form-control realization_date" placeholder="Select date"
          id="pc-datepicker-2" value="{{ now()->format('Y-m-d') }}">
          <span class="input-group-text">
          <i class="feather icon-calendar"></i>
          </span>
        </div>
        </div>
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Usuário Atendente</label>
        <select name="id_user" class="form-select line-data" id="exampleSelect1">
        <option value="">selecione atendente</option>
        @foreach ($desks as $desk)
      <option value="{{ $desk->id_user }}">{{ $desk->username }}</option>
      @endforeach
        </select>
      </div>
      </div>
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Associar à Operação</label>
      <select name="id_operation" class="form-select service-data" id="exampleSelect1">
        <option value="">selecione a operação</option>
        @foreach ($operations as $operation)
      <option value="{{ $operation->id_operation }}">{{ $operation->name }} -
      {{ $operation->counter->counter_name }} - {{ $operation->service->description }}
      </option>
      @endforeach
      </select>
      </div>
    </div>
    </div>
    <div class="card-footer">
    <button type="reset" class="btn btn-outline-primary me-2">Limpar campos</button>
    <button type="submit" class="btn btn-primary me-2">Atribuir</button>
    </div>
  </form>
  </div>
@endsection