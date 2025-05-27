@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.day.operation') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Criar Operação Diária</h4>
    <a class="btn btn-primary" href="{{ route('unit.list.day-operation') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar um novo operação podes editá-la.</div>
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
      href="{{ route('unit.list.day-operation') }}">Ver lista para editar!</a></strong></div>
    @endif

    @if ($successMessage = session('danger'))
    <div class="alert alert-warning" role="alert"> {{ $successMessage }} <strong><a
      href="{{ route('unit.list.day-operation') }}">Editar ou Exclutir operações !</a></strong></div>
    @endif

    @if (session('error'))
    <ul class="alert alert-danger ">
      <li class="ps-1">{{ session('error') }}</li>
    </ul>
    @endif

    <div id="mensagemErro" class="alert alert-danger d-none" role="alert"></div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Nome da Operação*</label>
        <input type="text" name="name" class="form-control" placeholder="Nome da Operação" value="{{ old('name') }}"
        required>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Data de Realização
        </label>
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
    <hr>

    <div class="row">
      <div class="col-md-2">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Iniciar Repetição Periódica?</label>
        <select name="repeat" class="form-select" id="exampleSelect1">
        <option value="0">NÃO</option>
        <option value="1">SIM</option>
        </select>
      </div>
      </div>
      <div class="col-md-5">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Data de Início
        </label>
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="input-group date">
          <input name="start_date" type="date" class="form-control realization_date" placeholder="Select date"
          id="pc-datepicker-2" value="{{ now()->format('Y-m-d') }}">
          <span class="input-group-text">
          <i class="feather icon-calendar"></i>
          </span>
        </div>
        </div>
      </div>
      </div>
      <div class="col-md-5">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Data de Término
        </label>
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="input-group date">
          <input name="end_date" type="date" class="form-control realization_date" placeholder="Select date"
          id="pc-datepicker-2" value="{{ now()->format('Y-m-d') }}">
          <span class="input-group-text">
          <i class="feather icon-calendar"></i>
          </span>
        </div>
        </div>
      </div>
      </div>

    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Ativado/Desativado</label>
        <select name="active" class="form-select" id="exampleSelect1">
        <option value="1">Ativado</option>
        <option value="0">Desactivado</option>
        </select>
      </div>
      </div>

    </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Criar Operação Diária</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection