@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('units.counter.store') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h5>Criar Nova Linha de Atendimento</h5>
    <a class="btn btn-primary" href="{{ route('unit.attendance-lines.list') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar um novo Linha de Atendimento podes editá-lo.</div>
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
      href="{{ route('unit.attendance-lines.list') }}">Ver lista para editar!</a></strong></div>
    @endif
    <div class="row">
      <div class="col-md-12">
      <div class="form-group mb-3">
        <label class="form-label">Linha de Atendimento/Balcão/Guichê*</label>
        <input type="text" name="counter_name" class="form-control" placeholder="Linha de Atendimento/Balcão/Guichê"
        required value="{{ old('counter_name') }}">
      </div>
      </div>
      <div class="form-group">
      <label class="form-label" for="exampleSelect1">Ativado/Desativado</label>
      <select name="active" class="form-select" id="exampleSelect1">
        <option value="1">Ativado</option>
        <option value="0">Desactivado</option>
      </select>
      </div>
    </div>
    <input type="hidden" name="company_id" value="{{ Auth::user()->unit_id }}">
    <div class="card-footer">
      <button class="btn btn-primary me-2">Criar Linha</button>
      <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>
@endsection