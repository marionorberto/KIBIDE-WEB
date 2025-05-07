<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="" style="height: 70px; width: 70px;">
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

        <li class="pc-item pc-caption">
          <label>Departamentos</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.departaments.create') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Adicionar Departamentos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.departaments.list') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Departamentos</span>
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
          <label>Display</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.painel.show', ['id' => 'ada']) }}" class="pc-link">
            <span class="pc-mtext btn btn-primary"><i class="ti ti-video-camera text-white"></i>Mostrar Display</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.list.desks') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-pencil"></i></span>
            <span class="pc-mtext">Configurar Display</span>
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
          <label>Tickects</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.tickets.generated') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ticket"></i></span>
            <span class="pc-mtext">Tickets Gerados</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('unit.tickets.settings') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-pencil"></i></span>
            <span class="pc-mtext">Configurações de Tickects</span>
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

        <li class="pc-item">
          <a href="{{ route('unit.notification.histories')  }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-report"></i></span>
            <span class="pc-mtext">Históricos de Notificações</span>
          </a>
        </li>


        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
              class="pc-mtext">Configurações</span><span class="pc-arrow"><i
                data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('unit.settings.index') }}">Configuração do
                Sistema</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('unit.settings.index') }}">Configuração do
                Display</a></li>
          </ul>
        </li>
      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-success">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>