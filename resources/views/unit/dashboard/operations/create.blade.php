@extends('layouts.dashboard-unit')

@section('title', 'dashboard')

@section('content')
  <form action="{{ route('unit.store.operation') }}" method="post" class="card">
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
      href="{{ route('unit.list.operation') }}">Ver lista para editar!</a></strong></div>
    @endif

    @if (session('error'))
    <ul class="alert alert-danger ">
      <li class="ps-1">{{ session('error') }}</li>
    </ul>
    @endif

    <div id="mensagemErro" class="alert alert-danger d-none" role="alert"></div>
    <div class="row">
      <input type="hidden" name="linhas_servicos" id="linhas_servicos">

      <input hidden type="text" name="name" value="fixo" class="form-control name" placeholder="Nome do operação"
      value="{{ old('name') }}" required>


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

        <!-- <input type="date" name="" id=""> -->
      </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label class="form-label" for="exampleSelect1">Linha de Atendimento</label>
        <select name="counter_id" class="form-select line-data" id="exampleSelect1">
        <option value="">selecione a Linha de Atendimento</option>
        @foreach ($counters as $counter)
      <option value="{{ $counter->id_counter }}">{{ $counter->counter_name }}</option>
      @endforeach
        </select>
      </div>
      </div>
      <div class="form-group col-md-6">
      <label class="form-label" for="exampleSelect1">Associar ao Serviço</label>
      <select name="service_id" class="form-select service-data" id="exampleSelect1">
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

    <!-- <button type="button" onclick="adicionarItem()">Adicionar à Lista</button> -->
    <a class="btn btn-outline-primary me-2" onclick="adicionarItem()">Adicionar à lista</a>
    <button type="reset" class="btn btn-light">Limpar Campos</button>

    <hr>
    <h5 class="mt-3">Lista de Operações</h5>
    <table id="myTable" class="table table-striped table-bordered nowrap">
      <thead>
      <tr>
        <th>Nº</th>
        <th>LINHAS ATENDIMENTO</th>
        <th>SERVIÇO</th>
        <th>AÇÃO</th>
      </tr>
      </thead>
      <tbody id="tabelaItens">
      <!-- Itens adicionados aparecerão aqui -->
      </tbody>
    </table>
    <button type="submit" onclick="prepararEnvio()" class="btn btn-primary me-2">Salvar Operações</button>
    </div>
  </form>
  </div>
  <script>
    let itens = [];
    let contador = 1;

    function adicionarItem() {
    const lineSelect = document.querySelector(".line-data");
    const serviceSelect = document.querySelector(".service-data");
    const name = document.querySelector(".name").value;
    const realization_date = document.querySelector(".realization_date").value;
    const realization_input = document.querySelector(".realization_date");


    const lineOption = lineSelect.options[lineSelect.selectedIndex];
    const serviceOption = serviceSelect.options[serviceSelect.selectedIndex];

    const line = {
      id: lineOption.value,
      nome: lineOption.textContent
    };

    const service = {
      id: serviceOption.value,
      nome: serviceOption.getAttribute('data-nome') || serviceOption.textContent
    };

    if (line && service) {
      const jaExiste = itens.some(item =>
      item.line.id === line.id && item.service.id === service.id
      );

      if (jaExiste) {
      mostrarErro("Esse item já foi adicionado a lista.");
      return;
      }

      if (itens.length >= 1) {
      const result = itens.some((item) => item.realization_date !== realization_date);

      if (result == true) {
        mostrarErro("Não pode trocar a data uma vez definida!.");
        return;
      }
      }

      itens.push({ name, realization_date, line, service, });

      realization_input.disabled = true

      console.log(itens);

      atualizarTabela();
      limparCampos();
      limparErro();
    } else {
      mostrarErro("Preencha todos os campos.");
      return;
    }
    }

    function atualizarTabela() {
    limparErro();

    const tbody = document.getElementById("tabelaItens");
    tbody.innerHTML = ""; // limpa

    itens.forEach((item, index) => {

      if (!item.line.id || !item.service.id) return;

      const row = `
    <tr>
    <td>${index + 1}</td>
    <td>${item.line.nome}</td>
    <td>${item.service.nome}</td>
    <td class="text-center">
    <ul class="list-inline me-auto mb-0">
    <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Remover">
    <a href="#" class="avtar avtar-xs btn-link-danger" onclick="removerItem(${index})">
    <i class="ti ti-trash f-18"></i>
    </a>
    </li>
    </ul>
    </td>
    </tr>
    `;
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
      event.preventDefault(); // Impede envio se estiver vazio
      return false;
    }

    const campoHidden = document.getElementById("linhas_servicos");
    campoHidden.value = JSON.stringify(itens);
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
    divErro.textContent = "";
    divErro.classList.add("d-none");
    }

  </script>


  <!-- 
    <script>
    let itens = [];

    function adicionarItem() {
    const lineSelect = document.querySelector('.line-data');
    const serviceSelect = document.querySelector('.service-data');

    const lineOption = lineSelect.options[lineSelect.selectedIndex];
    const serviceOption = serviceSelect.options[serviceSelect.selectedIndex];

    const line = {
    id: lineOption.value,
    nome: lineOption.textContent
    };

    const service = {
    id: serviceOption.value,
    nome: serviceOption.getAttribute('data-nome') || serviceOption.textContent
    };

    if (line.id && service.id) {
    itens.push({ line, service });
    atualizarLista();
    }
    }

    function atualizarLista() {
    const ul = document.getElementById('listaItens');
    ul.innerHTML = '';
    itens.forEach((item, index) => {
    ul.innerHTML += `<li>${item.line.nome} - ${item.service.nome}</li>`;
    });
    }

    function enviarLista() {
    document.getElementById('itensInput').value = JSON.stringify(itens);
    return true;
    }

    </script> -->
@endsection