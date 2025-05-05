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
            <span class="pc-micon"><i class="ti ti-camera"></i></span>
            <span class="pc-mtext">Perfil Admin</span>
          </a>
        </li>
        <li class="pc-item pc-caption">
          <label>Usuários</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Adicionar Usuário</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Listar Usuários</span>
          </a>
        </li>


        <li class="pc-item pc-caption">
          <label>Unidades</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Adicionar unidade</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Listar unidade</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Mensagem</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-settings"></i></span>
            <span class="pc-mtext">Nova Mensagem</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Caixa de Entrada</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Enviado</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Notificações</label>
          <i class="ti ti-brand-chrome"></i>
        </li>

        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Caixa de Entrada</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-bell"></i></span>
            <span class="pc-mtext">Históricos de Notificações</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Meus Matérias</label>
          <i class="ti ti-news"></i>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Livros</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Questionários</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-book"></i></span>
            <span class="pc-mtext">Links(Youtube)</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Enunciados Antigos</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Provas</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="#" class="pc-link">
            <span class="pc-micon"><i class="ti ti-ruler"></i></span>
            <span class="pc-mtext">Tópicos</span>
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