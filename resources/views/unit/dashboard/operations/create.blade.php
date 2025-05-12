@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.service') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5>Criar Operação diária</h5>
    <a class="btn btn-primary" href="{{ route('unit.services.list') }}">Ver Todos</a>
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
      href="{{ route('unit.services.list') }}">Ver lista para editar!</a></strong></div>
    @endif

    @if (session('error'))
    <ul class="alert alert-danger ">
      <li class="ps-1">{{ session('error') }}</li>
    </ul>
    @endif


    <div class="row">
      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Nome do operação*</label>
        <input type="text" name="description" class="form-control" placeholder="Nome do operação"
        value="{{ old('description') }}" required>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Data de Realização</label>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="input-group date">
          <input type="date" class="form-control" placeholder="Select date" id="pc-datepicker-2">
          <span class="input-group-text">
          <i class="feather icon-calendar"></i>
          </span>
        </div>
        </div>

        <!-- <input type="date" name="" id=""> -->
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Linha de Atendimento</label>
        <select name="active" class="form-select" id="exampleSelect1">
        <option value="">selecione a Linha de Atendimento</option>
        @foreach ($counters as $counter)
      <option value="{{ $counter->id_counter }}">{{ $counter->counter_name }}</option>
      @endforeach
        </select>
      </div>
      </div>
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Associar ao Serviço</label>
      <select name="priority_level" class="form-select" id="exampleSelect1">
        <option value="">selecione o serviço</option>
        @foreach ($services as $service)
      <option value="{{ $service->id_service }}">{{ $service->description }}</option>
      @endforeach
      </select>
      </div>

    </div>
    <!-- <div class="row">

    <div class="col-md-12">
    <div class="form-group">
    <label class="form-label" for="exampleSelect1">Ativado/Desativado</label>
    <select name="active" class="form-select" id="exampleSelect1">
    <option value="1">Ativado</option>
    <option value="0">Desactivado</option>
    </select>
    </div>
    </div>
    </div> -->
    </div>
    <div class="card-footer">
    <button class="btn btn-outline-primary me-2">Adicionar à lista</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    <hr>
    <table id="myTable" class="table table-striped table-bordered nowrap">
      <thead>
      <tr>
        <th>Nº</th>
        <th>LINHAS ATENDIMENTO</th>
        <th>SERVIÇO</th>
        <th>ACÃO</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>-----</td>
        <td>-----</td>
        <td>-----</td>
        <td class="text-center">
        <ul class="list-inline me-auto mb-0">
          <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
          <a data-bs-toggle="modal" data-bs-target="#modalDeleteUser" href="#"
            class="avtar avtar-xs btn-link-danger">
            <i class="ti ti-trash f-18"></i>
          </a>
          </li>
        </ul>
        </td>
      </tr>
      </tbody>
    </table>
    <button class="btn btn-primary me-2">Salvar Operações</button>
    </div>
  </form>
  </div>
@endsection