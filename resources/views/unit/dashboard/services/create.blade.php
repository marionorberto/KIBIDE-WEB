@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.service') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5>Criar Novo Serviço</h5>
    <a class="btn btn-primary" href="{{ route('unit.services.list') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar um novo serviço podes editá-lo.</div>
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
        <label class="form-label">Nome do serviço*</label>
        <input type="text" name="description" class="form-control" placeholder="Nome do serviço"
        value="{{ old('description') }}" required>
      </div>
      </div>
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Nível de Prioridade</label>
      <select name="priority_level" class="form-select" id="exampleSelect1">
        <option value="normal">Normal</option>
        <option value="urgent">Urgente</option>
      </select>
      </div>
    </div>
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
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Código de Prefixação*</label>
        <select name="prefix_code" class="form-select" id="exampleSelect1">
        <option value="">Selecione o Prefixo</option>
        <option value="A">Prefixo - A</option>
        <option value="B">Prefixo - B</option>
        <option value="C">Prefixo - C</option>
        <option value="D">Prefixo - D</option>
        <option value="E">Prefixo - E</option>
        <option value="F">Prefixo - F</option>
        <option value="G">Prefixo - G</option>
        <option value="H">Prefixo - H</option>
        <option value="I">Prefixo - I</option>
        <option value="J">Prefixo - J</option>
        <option value="K">Prefixo - K</option>
        <option value="L">Prefixo - L</option>
        </select>
      </div>
      </div>
    </div>
    </div>
    <div class="card-footer">
    <button class="btn btn-primary me-2">Criar Serviço</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection