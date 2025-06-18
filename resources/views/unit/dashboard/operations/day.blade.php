@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.day.operation') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Criar Operação Diária</h4>
    <a class="btn btn-primary" href="{{ route('unit.list.day-operation') }}">Ver Todas</a>
    </div>

    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar uma nova operação diária podes editá-la.</div>
      </div>
    </div>
    @endif

    @if ($errors->any())
    <ul class="alert alert-danger">
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
      href="{{ route('unit.list.day-operation') }}">Editar ou Excluir operações!</a></strong></div>
    @endif

    @if (session('error'))
    <ul class="alert alert-danger">
      <li class="ps-1">{{ session('error') }}</li>
    </ul>
    @endif

    <div id="mensagemErro" class="alert alert-danger d-none" role="alert"></div>

    <div class="row">
      <h6 class="text-muted mb-1">Criando novas operações diárias referentes à uma data, podes escolher o dia essa
      operação entre em vigor.</h6>
      <strong class="mb-3">Escolha uma data de realização dessa operação!</strong>

      <div class="col-md-6">
      <div class="form-group mb-3">
        <label class="form-label">Nome da Operação*</label>
        <input type="text" name="name" id="nome-operacao" class="form-control" placeholder="Nome da Operação"
        value="{{ old('name') }}" required readonly>
      </div>
      </div>

      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="data-realizacao">Data de Realização</label>
        <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="input-group date">
          <input name="realization_date" type="date" class="form-control realization_date" placeholder="Select date"
          id="data-realizacao" value="{{ now()->format('Y-m-d') }}">
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
      <h5 class="">Repetição periódica por data de término</h5>
      <h6 class="text-muted mb-4">Ao criar uma operação diária podes escolher entre repetir durante até no máximo 7 dias
      de periodicidade.</h6>

      <div class="col-md-2">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Repetir?</label>
        <select name="repeat" class="form-select" id="exampleSelect1">
        <option value="0">NÃO</option>
        <option value="1">SIM</option>
        </select>
      </div>
      </div>

      <div class="col-md-5">
      <div class="form-group">
        <label class="form-label">Data de Término</label>
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="input-group date">
          <input name="end_date" type="date" class="form-control realization_date" placeholder="Select date"
          value="{{ now()->format('Y-m-d') }}">
          <span class="input-group-text">
          <i class="feather icon-calendar"></i>
          </span>
        </div>
        </div>
      </div>
      </div>
    </div>

    <!-- <hr> -->
    <!-- 
    <div class="row">
      <h6 class="text-muted mb-3">Ao criar uma operação diária podes escolher em criá-la desactivada/activada!</h6>
      <div class="col-md-6 mt-2">
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
    <button type="submit" class="btn btn-primary">Criar Operação Diária</button>
    <button type="reset" class="btn btn-light">Limpar Campos</button>
    </div>
  </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const dataInput = document.getElementById('data-realizacao');
    const nomeOperacaoInput = document.getElementById('nome-operacao');

    const meses = [
      'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho',
      'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'
    ];

    dataInput.addEventListener('change', function () {
      const data = this.value; // formato yyyy-mm-dd

      if (data) {
      const [ano, mes, dia] = data.split('-');
      const nomeMes = meses[parseInt(mes, 10) - 1];
      const nomeOperacao = `operacao-${nomeMes}-${dia}${mes}${ano}`;
      nomeOperacaoInput.value = nomeOperacao;
      } else {
      nomeOperacaoInput.value = '';
      }
    });

    // Executar ao carregar a página se já houver data
    if (dataInput.value) {
      dataInput.dispatchEvent(new Event('change'));
    }
    });
  </script>
@endsection