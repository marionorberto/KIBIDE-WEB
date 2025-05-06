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

          <a href="{{ route('company.index') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>

        </li>
        <li class="pc-item">
          <a href="{{ route('company.admin.profile') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user"></i></span>
            <span class="pc-mtext">Perfil</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Usuários</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.create.users') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Adicionar Usuário</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.list.users') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Listar Usuários</span>
          </a>
        </li>


        <li class="pc-item pc-caption">
          <label>Unidades</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.create.units') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Adicionar unidade</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.list.units') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Listar unidade</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Mensagem</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.create.sms') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Nova Mensagem</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.sms.Inbox') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-inbox"></i></span>
            <span class="pc-mtext">Caixa de Entrada</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.sms.sent') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-check"></i></span>
            <span class="pc-mtext">Enviado</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Notificações</label>
          <i class="ti ti-brand-chrome"></i>
        </li>

        <li class="pc-item">
          <a href="{{ route('company.notification.inbox') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-inbox"></i></span>
            <span class="pc-mtext">Caixa de Entrada</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ route('company.notification.histories')  }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-report"></i></span>
            <span class="pc-mtext">Históricos de Notificações</span>
          </a>
        </li>


        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
              class="pc-mtext">Configurações</span><span class="pc-arrow"><i
                data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{ route('company.settings.index') }}">Configuração do
                Sistema</a></li>
            <li class="pc-item"><a class="pc-link" href="{{ route('company.settings.index') }}">Configuração do
                Display</a></li>
          </ul>
        </li>
      </ul>
      <div class="card text-center">
        <div class="card-body">
          <h5>Atenção</h5>
          <p>Salve alterações pendentes antes de sair!</p>
          <a href="{{ route('auth.logout') }}" class="btn btn-warning">sair</a>
        </div>
      </div>
    </div>
  </div>
</nav>