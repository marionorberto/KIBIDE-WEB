@extends('layouts.dashboard-unit')

@section('title', 'Dashboard')

@section('content')
  <form action="{{ route('unit.store.assign.operation') }}" method="POST" class="card" onsubmit="return prepararEnvio()">
    @csrf

    <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Escalar Operação Diária</h4>
    <a class="btn btn-primary" href="{{ route('unit.list.operation') }}">Ver Todos</a>
    </div>

    <div class="card-body">
    {{-- Mensagens --}}
    @if (!$errors->any() && !session('success'))
    <div class="alert alert-primary d-flex align-items-center">
      <i class="ti ti-info-circle h2 f-w-400 mb-0 me-3"></i>
      <div>Faça uma escala de operações relacionando os teus atendentes.</div>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
      </ul>
    </div>
    @endif

    @if ($successMessage = session('success'))
    <div class="alert alert-success">
      {{ $successMessage }}
      <strong><a href="{{ route('unit.list.operation') }}">Ver lista para editar!</a></strong>
    </div>
    @endif

    @if ($dangerMessage = session('danger'))
    <div class="alert alert-warning">
      {{ $dangerMessage }}
      <strong><a href="{{ route('unit.list.operation') }}">Editar ou Excluir operações!</a></strong>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
      <li>{{ session('error') }}</li>
    </div>
    @endif

    <div id="mensagemErro" class="alert alert-danger d-none"></div>

    {{-- Inputs ocultos --}}
    <input type="hidden" name="realization_date" id="inputRealizationDate">
    <input type="hidden" name="id_day_operation" id="inputDayOperation">
    <input type="hidden" name="users_desk" id="inputIdUsersJson">

    {{-- Data de realização --}}
    <div class="mb-3">
      <label for="realizationDate" class="form-label">Data de Realização</label>
      <div class="input-group">
      <input type="date" class="form-control" id="realizationDate" value="{{ now()->format('Y-m-d') }}">
      <span class="input-group-text"><i class="feather icon-calendar"></i></span>
      </div>
    </div>

    {{-- Seleção de atendente e operação --}}
    <div class="row mb-3">
      <div class="col-md-6">
      <label for="userDeskSelect" class="form-label">Lista de Usuários Atendentes</label>
      <select class="form-select" id="userDeskSelect">
        <option value="">Selecione atendente</option>
        @foreach ($desks as $desk)
      <option value="{{ $desk->id_user }}">{{ $desk->username }}</option>
      @endforeach
      </select>
      </div>

      <div class="col-md-6">
      <label for="dayOperationSelect" class="form-label">Associar à Operação Diária</label>
      <select class="form-select" id="dayOperationSelect" disabled>
        <option value="">Selecione a operação diária</option>
        @foreach ($operations as $operation)
      <option value="{{ $operation->id_day_operation }}">
      {{ $operation->name }} - {{ $operation->created_at }}
      </option>
      @endforeach
      </select>
      </div>
    </div>
    </div>

    {{-- Rodapé com ações e tabela --}}
    <div class="card-footer">
    <button type="button" class="btn btn-outline-primary me-2" onclick="adicionarItem()">Adicionar à lista</button>
    <button type="reset" class="btn btn-light" onclick="cancelarOperacao()">Limpar Campos</button>

    <hr>
    <h5 class="mt-3">Lista de Atendentes</h5>
    <table class="table table-striped table-bordered nowrap">
      <thead>
      <tr>
        <th>Nº</th>
        <th>ATENDENTE</th>
        <th>OPERAÇÃO DIÁRIA</th>
        <th>AÇÃO</th>
      </tr>
      </thead>
      <tbody id="tabelaItens"></tbody>
    </table>

    <button type="submit" class="btn btn-primary me-2">Salvar Escala</button>
    <button type="reset" onclick="cancelarOperacao()" class="btn btn-outline-primary me-2">Cancelar Escala</button>
    </div>
  </form>

  {{-- Scripts --}}
  <script>
    document.addEventListener('DOMContentLoaded', () => {
    const realizationDate = document.getElementById('realizationDate');
    const dayOperationSelect = document.getElementById('dayOperationSelect');
    const inputDayOperation = document.getElementById('inputDayOperation');

    function carregarOperacao(date) {
      if (!date) {
      dayOperationSelect.innerHTML = '<option value="">Nenhuma operação encontrada</option>';
      dayOperationSelect.disabled = true;
      inputDayOperation.value = '';
      return;
      }

      fetch(`/api/operation/${date}`)
      .then(response => response.json())
      .then(data => {
        if (data.status === 200 && data.data) {
        const option = new Option(`${data.data.name} - ${data.data.realization_date}`, data.data.id_day_operation);
        dayOperationSelect.innerHTML = '';
        dayOperationSelect.appendChild(option);
        dayOperationSelect.disabled = false;
        dayOperationSelect.value = data.data.id_day_operation;
        inputDayOperation.value = data.data.id_day_operation;
        } else {
        dayOperationSelect.innerHTML = '<option value="">Nenhuma operação encontrada</option>';
        dayOperationSelect.disabled = true;
        inputDayOperation.value = '';
        }
      }).catch(() => {
        dayOperationSelect.innerHTML = '<option value="">Nenhuma operação encontrada</option>';
        dayOperationSelect.disabled = true;
        inputDayOperation.value = '';
      });
    }

    realizationDate.addEventListener('change', () => carregarOperacao(realizationDate.value));
    carregarOperacao(realizationDate.value);
    });

    let listaItens = [];
    let contador = 1;

    function adicionarItem() {
    const userDeskSelect = document.getElementById('userDeskSelect');
    const dayOperationSelect = document.getElementById('dayOperationSelect');
    const mensagemErro = document.getElementById('mensagemErro');

    mensagemErro.classList.add('d-none');
    mensagemErro.textContent = '';

    if (!userDeskSelect.value) {
      mensagemErro.textContent = "Por favor, selecione um atendente.";
      mensagemErro.classList.remove('d-none');
      return;
    }

    if (!dayOperationSelect.value) {
      mensagemErro.textContent = "Por favor, selecione uma operação diária.";
      mensagemErro.classList.remove('d-none');
      return;
    }

    if (listaItens.some(item => item.id_user === userDeskSelect.value && item.id_day_operation === dayOperationSelect.value)) {
      mensagemErro.textContent = "Este atendente já foi adicionado.";
      mensagemErro.classList.remove('d-none');
      return;
    }

    const item = {
      id: contador++,
      id_user: userDeskSelect.value,
      username: userDeskSelect.options[userDeskSelect.selectedIndex].text,
      id_day_operation: dayOperationSelect.value,
      operation: dayOperationSelect.options[dayOperationSelect.selectedIndex].text,
    };

    listaItens.push(item);
    atualizarTabela();
    }

    function atualizarTabela() {
    const tabela = document.getElementById('tabelaItens');
    tabela.innerHTML = '';

    listaItens.forEach((item, index) => {
      const row = `<tr>
      <td>${index + 1}</td>
      <td>${item.username}</td>
      <td>${item.operation}</td>
      <td>
      <button type="button" class="btn btn-danger btn-sm" onclick="removerItem(${item.id})">Remover</button>
      </td>
      <input type="hidden" name="items[${index}][id_user]" value="${item.id_user}">
      <input type="hidden" name="items[${index}][id_day_operation]" value="${item.id_day_operation}">
      </tr>`;
      tabela.insertAdjacentHTML('beforeend', row);
    });
    }

    function removerItem(id) {
    listaItens = listaItens.filter(item => item.id !== id);
    atualizarTabela();
    }

    function cancelarOperacao() {
    listaItens = [];
    contador = 1;
    atualizarTabela();
    }

    function prepararEnvio() {
    const realizationDate = document.getElementById('realizationDate').value;
    const inputRealizationDate = document.getElementById('inputRealizationDate');
    const inputIdUsersJson = document.getElementById('inputIdUsersJson');
    const inputDayOperation = document.getElementById('inputDayOperation');
    const mensagemErro = document.getElementById('mensagemErro');

    mensagemErro.classList.add('d-none');
    mensagemErro.textContent = '';

    if (!realizationDate || !inputDayOperation.value || listaItens.length === 0) {
      mensagemErro.textContent = "É necessário adicionar pelo menos um atendente para salvar a escala.";
      mensagemErro.classList.remove('d-none');
      return false;
    }

    const idUsers = listaItens.map(item => item.id_user);

    inputRealizationDate.value = realizationDate;
    inputIdUsersJson.value = JSON.stringify(idUsers);

    return true;
    }
  </script>
@endsection