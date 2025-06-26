@php
  use App\Models\DayOperation;
  use App\Models\OperationAssociation;
  use App\Models\ProfileCompany;
  use Carbon\Carbon;

  $companyData = ProfileCompany::where('company_id', Auth::user()->company_id)->first();


@endphp


<Style>
  @import "normalize.css";

  @font-face {
    font-family: "Geist Sans";
    src: url("https://assets.codepen.io/605876/GeistVF.ttf") format("truetype");
  }


  .span-button {
    height: 38px;
    padding: 0;
    display: grid;
    border-radius: 8px;
    border: 2px solid black;
    letter-spacing: 0.25px;
    cursor: pointer;
    position: relative;
    background: black;
    color: white;
    font-weight: 80;
    scale: 1;
    outline-color: hsl(75 100% 45%);
    outline-offset: 0.25rem;
  }

  .span-button:is(:hover, :focus-visible) {
    --active: 1;
  }

  .span-button:active {
    --pressed: 1;
  }

  .span-button>span:nth-of-type(1) {
    height: 100%;
    width: 100%;
    border-radius: 8px;
    position: absolute;
    inset: 0;
    scale: calc(1 - (var(--pressed, 0) * 0.05));
    transition: scale 0.1s;
  }

  .span-button:is(:hover, :focus-visible) .container {
    width: 100%;
  }

  .container {
    --mask-image: url(https://assets.codepen.io/605876/chev-mask_1.png);
    --spread: 24px;
    --size: 28px;
    width: 48px;
    height: 100%;
    background: hsl(75 100% 65%);
    position: absolute;
    left: 0;
    transition: width 0.25s;
    border-radius: 6px;
    box-shadow: 0 10px 10px -5px hsl(0 0% 0% / 0.5);
    container-type: inline-size;
  }

  .primary {
    content: "";
    position: absolute;
    inset: 0;
    background: hsl(0 0% 0% / 0.15);
    z-index: 2;
    mask: var(--mask-image) 50% 50% / var(--size) var(--size) no-repeat;
    container-type: inline-size;
  }

  :where(.primary, .complimentary)::after {
    --distance: calc(100cqi + 100%);
    content: "";
    height: calc(var(--size) * 4);
    aspect-ratio: 1;
    position: absolute;
    left: 0%;
    top: 50%;
    translate: -50% -50%;
    background: radial-gradient(hsl(0 0% 0%), transparent);
    animation: fly-by calc((2 - var(--active, 0)) * 1s) infinite linear;
  }

  @keyframes fly-by {
    0% {
      translate: -100% -50%;
    }

    100% {
      translate: var(--distance) -50%;
    }
  }

  .complimentary {
    content: "";
    position: absolute;
    inset: 0;
    opacity: var(--active, 0);
    transition: opacity 0.25s;
    background: hsl(0 0% 0% / 0.15);
    mask:
      var(--mask-image) calc(50% - (var(--spread) * 1)) 50% / var(--size) var(--size) no-repeat,
      var(--mask-image) calc(50% - (var(--spread) * 2)) 50% / var(--size) var(--size) no-repeat,
      var(--mask-image) calc(50% - (var(--spread) * 3)) 50% / var(--size) var(--size) no-repeat,
      var(--mask-image) calc(50% + (var(--spread) * 1)) 50% / var(--size) var(--size) no-repeat,
      var(--mask-image) calc(50% + (var(--spread) * 2)) 50% / var(--size) var(--size) no-repeat,
      var(--mask-image) calc(50% + (var(--spread) * 3)) 50% / var(--size) var(--size) no-repeat;
  }

  .span-button>span:nth-of-type(2) {
    padding: 0 1.1rem 0 calc(58px + 1.1rem);
    display: grid;
    place-items: center;
    height: 100%;
  }
</Style>

<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header d-flex justify-content-center py-3">
      <a href="#">
        <img
          src="{{ isset($companyData->photo) ? asset('storage/' . $companyData->photo) : asset('assets/images/LOGO.png') }}"
          alt="" style="height: 80px; width: 80px;">
      </a>

    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="{{ route('unit.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.manager.profile') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user"></i></span>
            <span class="pc-mtext">Perfil Unidade</span>
          </a>
        </li>

        <li class="pc-item">
          <a target="_blank" href="{{ route('unit.painel.show') }}" class="pc-link">
            <button class="span-button">
              <span>
                <span class="container">
                  <span class="primary"></span>
                  <span class="complimentary"></span>
                </span>
              </span>
              <span>Mostrar display</span>
            </button>
          </a>
        </li>


        <li class="pc-item pc-caption">
          <label>Serviços</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.services.create') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Adicionar Serviços</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.services.list') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Listar Serviços</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Linhas de Atendimentos</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.attendance-lines.create') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Adicionar Linhas</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.attendance-lines.list') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Listar Linhas</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Atendentes</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.create.desks') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Adicionar Atendentes</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.list.desks') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Listar Atendentes</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Operacões</label>
          <i class="ti ti-brand-chrome"></i>
        </li>

        <li class="pc-item">
          <a href="{{ route('unit.create.day-operation') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Operação Diária</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.list.day-operation') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-eye"></i></span>
            <span class="pc-mtext">Visualizar Operações</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.associate.operation') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-unlink"></i></span>
            <span class="pc-mtext">Associar Operação</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.assign.operation') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-layout"></i></span>
            <span class="pc-mtext">Escalar Operação</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('unit.list.scales') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-eye"></i></span>
            <span class="pc-mtext">Visualizar Escalas</span>
          </a>
        </li>



        <li class="pc-item pc-caption">
          <label>Mensagem</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.create.sms') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Nova Mensagem</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.sms.inbox') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-inbox"></i></span>
            <span class="pc-mtext">Caixa de Entrada</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.sms.sent') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-check"></i></span>
            <span class="pc-mtext">Enviado</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Notificações</label>
          <i class="ti ti-brand-chrome"></i>
        </li>

        <li class="pc-item">
          <a href="{{ route('unit.notification.inbox') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-inbox"></i></span>
            <span class="pc-mtext">Caixa de Entrada</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Configurações</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.tickets.settings') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Config. Gerais</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.settings.operation') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-eraser"></i></span>
            <span class="pc-mtext">Config. Operações <span class="badge bg-light-primary">default</span></span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.tickets.settings') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-map"></i></span>
            <span class="pc-mtext">Config. Display</span>
          </a>
        </li>

      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-primary">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>