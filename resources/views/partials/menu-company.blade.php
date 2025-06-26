@php
  use App\Models\ProfileCompany;
  $companyData = ProfileCompany::where('company_id', Auth::user()->company_id)->first();
@endphp

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
          <label>Mensagens</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.create.sms') }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plus"></i></span>
            <span class="pc-mtext">Nova Mensagem</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.sms.inbox') }}" class="pc-link">
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

        <!-- <li class="pc-item">
          <a href="{{ route('company.notification.histories')  }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-report"></i></span>
            <span class="pc-mtext">Históricos de Notificações</span>
          </a>
        </li> -->
        <!-- <li class="pc-item pc-caption">
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
        </li> -->
        <li class="pc-item pc-caption">
          <label>Licença</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.licence.index')  }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-key"></i></span>
            <span class="pc-mtext">Status Licença</span>
          </a>
        </li>
        <hr>
        <li class="pc-item pc-caption">
          <label>Configurações</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('company.licence.index')  }}" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Config. Gerais</span>
          </a>
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