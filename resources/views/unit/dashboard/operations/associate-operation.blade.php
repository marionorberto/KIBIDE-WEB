@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.operation-association') }}" method="post" class="card">
    @csrf
    <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Associar Operação</h4>
    <a class="btn btn-primary" href="{{ route('unit.services.list') }}">Ver Todos</a>
    </div>
    <div class="card-body">
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary">
      <div class="media align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
      <div class="media-body ms-3">Após criar uma nova operação, você pode editá-la.</div>
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
      href="{{ route('unit.list.operation') }}">Ver lista para editar!</a></strong></div>
    @endif

    @if ($successMessage = session('danger'))
    <div class="alert alert-warning" role="alert"> {{ $successMessage }} <strong><a
      href="{{ route('unit.list.operation') }}">Editar ou Excluir operações!</a></strong></div>
    @endif

    @if (session('error'))
    <ul class="alert alert-danger">
      <li class="ps-1">{{ session('error') }}</li>
    </ul>
    @endif

    <div id="mensagemErro" class="alert alert-danger d-none" role="alert"></div>

    <div class="row">
      <h5 class="mb-4">Escolha uma data para associar a operação diária já criada previamente!</h5>
      <input type="hidden" name="dataToRequest" id="dataToRequest">
      <input hidden type="text" name="name" value="fixo" class="form-control name" required>

      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="pc-datepicker-2">Data de Realização</label>
        <div class="input-group date">
        <input name="realization_date" type="date" class="form-control realization_date" id="pc-datepicker-2"
          value="{{ now()->format('Y-m-d') }}">
        <span class="input-group-text"><i class="feather icon-calendar"></i></span>
        </div>
      </div>
      </div>

      <div class="col-md-6">
      <label for="dayOperationSelect" class="form-label">Associar à Operação Diária</label>
      <select name="id_day_operation" class="form-select" id="dayOperationSelect" disabled>
        <option value="">Selecione a operação diária</option>
      </select>
      </div>
    </div>

    <hr>
    <div class="row mt-3">
      <h5 class="mb-4">Associe serviços e linhas de atendimento à operação escolhida!</h5>
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Linha de Atendimento</label>
        <select name="counter_id" class="form-select line-data" id="linhaAtendimento">
        <option value="">Selecione a Linha de Atendimento</option>
        @foreach ($counters as $counter)
      <option value="{{ $counter->id_counter }}">{{ $counter->counter_name }}</option>
      @endforeach
        </select>
      </div>
      </div>

      <div class="col-md-6">
      <label class="form-label" for="exampleSelect1">Associar ao Serviço</label>
      <select name="service_id" class="form-select service-data" id="servico">
        <option value="">Selecione o serviço</option>
        @foreach ($services as $service)
      <option value="{{ $service->id_service }}">{{ $service->description }}</option>
      @endforeach
      </select>
      </div>
    </div>
    </div>

    <div class="card-footer">
    <a class="btn btn-outline-primary me-2" onclick="adicionarItem()">Adicionar à lista</a>
    <button type="reset" class="btn btn-light">Limpar Campos</button>

    <hr>
    <h5 id="title-list-operations" class="mt-3" style="display: none;">Lista de Operações</h5>
    <table id="table-list-operations" class="table table-striped table-bordered nowrap" style="display: none;">
      <thead>
      <tr>
        <th>Nº</th>
        <th>LINHAS ATENDIMENTO</th>
        <th>SERVIÇO</th>
        <th>OPERAÇÃO</th>
        <th>AÇÃO</th>
      </tr>
      </thead>
      <tbody id="tabelaItens">
      </tbody>
    </table>
    <button id="button-save-operations" type="submit" onclick="prepararEnvio()" class="btn btn-primary me-2"
      style="display: none;">Salvar Operações</button>
    </div>
  </form>

  <script>
    let itens = [];
    let contador = 1;

    async function buscarOperacaoPorData(date) {
    const select = document.getElementById('dayOperationSelect');
    if (!date) return;

    select.innerHTML = '';
    select.disabled = true;

    try {
      const response = await fetch(`/api/operation/${date}`);
      const data = await response.json();

      if (data.status == 200) {
      const option = document.createElement('option');
      option.value = data.data.id_day_operation;
      option.text = `${data.data.name} - ${data.data.created_at}`;
      option.setAttribute('data-name', data.data.name);
      select.appendChild(option);
      select.disabled = false;
      } else {
      select.innerHTML = '<option value="">Nenhuma operação encontrada</option>';
      }
    } catch (error) {
      console.error('Erro ao buscar operações:', error);
      select.innerHTML = '<option value="">Nenhuma operação encontrada</option>';
    }
    }

    document.querySelector('.realization_date').addEventListener('change', function () {
    buscarOperacaoPorData(this.value);
    });

    document.addEventListener('DOMContentLoaded', function () {
    const defaultDate = document.querySelector('.realization_date').value;
    buscarOperacaoPorData(defaultDate);
    });

    function adicionarItem() {
    const lineSelect = document.querySelector(".line-data");
    const serviceSelect = document.querySelector(".service-data");
    const operationSelect = document.getElementById("dayOperationSelect");
    const name = document.querySelector(".name").value;
    const realization_date = document.querySelector(".realization_date").value;
    const realization_input = document.querySelector(".realization_date");

    const lineOption = lineSelect.options[lineSelect.selectedIndex];
    const serviceOption = serviceSelect.options[serviceSelect.selectedIndex];
    const operationOption = operationSelect.options[operationSelect.selectedIndex];

    const line = {
      id: lineOption.value,
      nome: lineOption.textContent
    };

    const service = {
      id: serviceOption.value,
      nome: serviceOption.textContent
    };

    const operation = {
      id: operationOption.value,
      nome: operationOption.getAttribute('data-name') || operationOption.textContent
    };

    if (!line.id || !service.id) {
      mostrarErro('Escolha uma Linha de atendimento e um serviço!');
      return;
    }

    if (line && service && operation.id) {
      const jaExiste = itens.some(item =>
      item.line.id === line.id && item.service.id === service.id
      );

      if (jaExiste) {
      mostrarErro("Esse item já foi adicionado à lista.");
      return;
      }

      if (itens.length >= 1) {
      const result = itens.some((item) => item.realization_date !== realization_date);
      if (result == true) {
        mostrarErro("Não pode trocar a data uma vez definida!");
        return;
      }
      }

      itens.push({ realization_date, line, service, operation });

      realization_input.disabled = true;
      atualizarTabela();
      limparCampos();
      limparErro();
    } else {
      mostrarErro("Preencha todos os campos.");
    }
    }

    function atualizarTabela() {
    limparErro();
    const titleListOperations = document.getElementById('title-list-operations');
    const tableListOperations = document.getElementById('table-list-operations');
    const buttonSaveOperations = document.getElementById('button-save-operations');

    titleListOperations.style.display = 'block';
    tableListOperations.style.display = 'block';
    buttonSaveOperations.style.display = 'block';

    const tbody = document.getElementById("tabelaItens");
    tbody.innerHTML = "";

    itens.forEach((item, index) => {
      const row = `
      <tr>
      <td>${index + 1}</td>
      <td>${item.line.nome}</td>
      <td>${item.service.nome}</td>
      <td>${item.operation.nome}</td>
      <td class="text-center">
      <ul class="list-inline me-auto mb-0">
      <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Remover">
      <a href="#" class="avtar avtar-xs btn-link-danger" onclick="removerItem(${index})">
      <i class="ti ti-trash f-18"></i>
      </a>
      </li>
      </ul>
      </td>
      </tr>`;
      tbody.innerHTML += row;
    });
    }

    function removerItem(index) {
    itens.splice(index, 1);
    atualizarTabela();
    }

    function prepararEnvio() {
    if (itens.length === 0) {
      mostrarErro("Adicione pelo menos um item antes de salvar.");
      event.preventDefault();
      return false;
    }
    document.getElementById("dataToRequest").value = JSON.stringify(itens);
    }

    function limparCampos() {
    document.getElementById("linhaAtendimento").value = "";
    document.getElementById("servico").value = "";
    }

    function mostrarErro(mensagem) {
    const divErro = document.getElementById("mensagemErro");
    divErro.textContent = mensagem;
    divErro.classList.remove("d-none");
    }

    function limparErro() {
    const divErro = document.getElementById("mensagemErro");
    divErro.classList.add("d-none");
    divErro.textContent = "";
    }
  </script>
@endsection